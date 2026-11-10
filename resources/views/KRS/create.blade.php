@extends('layouts.app')

@section('title', 'Tambah KRS')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h1 class="h3 mb-1 text-gray-800">Tambah KRS</h1>
            <p class="text-muted mb-0">Formulir penambahan data Kartu Rencana Studi dan pemilihan mata kuliah mahasiswa.</p>
        </div>
    </div>

    <div class="card border-0 shadow-sm">
        <div class="card-header bg-body fw-semibold py-3">Form Tambah KRS</div>
        <div class="card-body">
            <form action="{{ route('krs.store') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label for="mahasiswa_id" class="form-label">Mahasiswa</label>
                    <select name="mahasiswa_id" id="mahasiswa_id" class="form-select @error('mahasiswa_id') is-invalid @enderror" required>
                        <option value="">-- Pilih Mahasiswa dari Database --</option>
                        @foreach($mahasiswa as $mhs)
                            <option value="{{ $mhs->id }}" {{ old('mahasiswa_id') == $mhs->id ? 'selected' : '' }}>
                                {{ $mhs->nim }} - {{ $mhs->nama }}
                            </option>
                        @endforeach
                    </select>
                    @error('mahasiswa_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="tahun_akademik" class="form-label">Tahun Akademik</label>
                    <input type="text" name="tahun_akademik" id="tahun_akademik" class="form-control @error('tahun_akademik') is-invalid @enderror" placeholder="Contoh: 2025/2026" value="{{ old('tahun_akademik') }}" required>
                    @error('tahun_akademik')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="semester" class="form-label">Semester</label>
                    <select name="semester" id="semester" class="form-select @error('semester') is-invalid @enderror" required>
                        <option value="">-- Pilih Semester --</option>
                        <option value="Ganjil" {{ old('semester') == 'Ganjil' ? 'selected' : '' }}>Ganjil</option>
                        <option value="Genap" {{ old('semester') == 'Genap' ? 'selected' : '' }}>Genap</option>
                    </select>
                    @error('semester')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="status" class="form-label">Status</label>
                    <select name="status" id="status" class="form-select @error('status') is-invalid @enderror" required>
                        <option value="draft" {{ old('status') == 'draft' ? 'selected' : '' }}>Draft</option>
                        <option value="diajukan" {{ old('status') == 'diajukan' ? 'selected' : '' }}>Diajukan</option>
                        <option value="disetujui" {{ old('status') == 'disetujui' ? 'selected' : '' }}>Disetujui</option>
                        <option value="ditolak" {{ old('status') == 'ditolak' ? 'selected' : '' }}>Ditolak</option>
                    </select>
                    @error('status')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label class="form-label fw-semibold">Pilih Mata Kuliah (Dari Database)</label>
                    <div class="border p-3 rounded bg-light" style="max-height: 250px; overflow-y: auto;">
                        @forelse($mataKuliah as $mk)
                            <div class="form-check mb-2">
                                <input class="form-check-input" type="checkbox" name="mata_kuliah_ids[]" value="{{ $mk->id }}" id="mk_{{ $mk->id }}" {{ (is_array(old('mata_kuliah_ids')) && in_array($mk->id, old('mata_kuliah_ids'))) ? 'checked' : '' }}>
                                <label class="form-check-label" for="mk_{{ $mk->id }}">
                                    <strong>{{ $mk->kode ?? '-' }}</strong> - {{ $mk->nama ?? $mk->nama_mk ?? '-' }} ({{ $mk->sks ?? 0 }} SKS)
                                </label>
                            </div>
                        @empty
                            <p class="text-muted mb-0">Belum ada data mata kuliah di database.</p>
                        @endforelse
                    </div>
                    @error('mata_kuliah_ids')
                        <div class="text-danger small mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <div class="d-flex justify-content-between">
                    <a href="{{ route('krs.index') }}" class="btn btn-secondary">Kembali</a>
                    <button type="submit" class="btn btn-primary">Simpan KRS</button>
                </div>
            </form>
        </div>
    </div>
@endsection