@extends('layouts.app')

@section('title', 'Edit Mata Kuliah')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-body fw-semibold d-flex justify-content-between align-items-center">
                    <span>Edit Data Mata Kuliah</span>
                    <a href="{{ route('matakuliah.index') }}" class="btn btn-secondary btn-sm">Kembali</a>
                </div>
                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('matakuliah.update', $matakuliah->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="kode_mk" class="form-label">Kode MK</label>
                            <input type="text" class="form-control" id="kode_mk" name="kode_mk" value="{{ old('kode_mk', $matakuliah->kode_mk) }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="nama_mk" class="form-label">Nama Mata Kuliah</label>
                            <input type="text" class="form-control" id="nama_mk" name="nama_mk" value="{{ old('nama_mk', $matakuliah->nama_mk) }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="sks" class="form-label">SKS</label>
                            <input type="number" class="form-control" id="sks" name="sks" value="{{ old('sks', $matakuliah->sks) }}" min="1" max="6" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Perbarui</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection