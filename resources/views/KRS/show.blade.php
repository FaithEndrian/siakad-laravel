@extends('layouts.app')

@section('title', 'Detail KRS')

@section('content')
    <x-page-header judul="Detail KRS"
                    deskripsi="Informasi lengkap Kartu Rencana Studi dan daftar mata kuliah mahasiswa." />

    <div class="card border-0 shadow-sm mb-4">
        <div class="card-header bg-body fw-semibold py-3 d-flex justify-content-between align-items-center">
            <span>Informasi KRS</span>
            <a href="{{ route('krs.index') }}" class="btn btn-secondary btn-sm">
                <i class="fas fa-arrow-left me-1"></i> Kembali
            </a>
        </div>
        <div class="card-body">
            <table class="table table-bordered align-middle">
                <tr>
                    <th width="25%">NIM</th>
                    <td>{{ $krs->mahasiswa->nim ?? '-' }}</td>
                </tr>
                <tr>
                    <th>Nama Mahasiswa</th>
                    <td>{{ $krs->mahasiswa->nama ?? '-' }}</td>
                </tr>
                <tr>
                    <th>Tahun Akademik</th>
                    <td>{{ $krs->tahun_akademik ?? '-' }}</td>
                </tr>
                <tr>
                    <th>Semester</th>
                    <td>{{ $krs->semester ?? '-' }}</td>
                </tr>
                <tr>
                    <th>Status</th>
                    <td>
                        @if($krs->status == 'disetujui')
                            <span class="badge bg-success">Disetujui</span>
                        @elseif($krs->status == 'diajukan')
                            <span class="badge bg-primary">Diajukan</span>
                        @elseif($krs->status == 'ditolak')
                            <span class="badge bg-danger">Ditolak</span>
                        @else
                            <span class="badge bg-secondary">Draft</span>
                        @endif
                    </td>
                </tr>
            </table>
        </div>
    </div>

    <div class="card border-0 shadow-sm">
        <div class="card-header bg-body fw-semibold py-3">Daftar Mata Kuliah yang Diambil</div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped align-middle">
                    <thead>
                        <tr>
                            <th width="5%">No.</th>
                            <th>Kode Mata Kuliah</th>
                            <th>Nama Mata Kuliah</th>
                            <th>SKS</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($krs->mataKuliah as $index => $mk)
                            <tr>
                                <td class="text-center">{{ $index + 1 }}</td>
                                <td>{{ $mk->kode ?? '-' }}</td>
                                <td>{{ $mk->nama ?? $mk->nama_mk ?? '-' }}</td>
                                <td>{{ $mk->sks ?? 0 }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center text-muted">Belum ada mata kuliah yang dipilih pada KRS ini.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
