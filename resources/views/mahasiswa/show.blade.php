@extends('layouts.app')

@section('title', 'Detail Mahasiswa')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-body fw-semibold d-flex justify-content-between align-items-center">
                    <span>Detail Data Mahasiswa</span>
                    <a href="{{ route('mahasiswa.index') }}" class="btn btn-secondary btn-sm">Kembali</a>
                </div>
                <div class="card-body">
                    <p><strong>NIM:</strong> {{ $mahasiswa->nim }}</p>
                    <p><strong>Nama Lengkap:</strong> {{ $mahasiswa->nama }}</p>
                    <p><strong>Jenis Kelamin:</strong> {{ $mahasiswa->jenis_kelamin == 'L' ? 'Laki-laki' : 'Perempuan' }}</p>
                    <p><strong>Angkatan:</strong> {{ $mahasiswa->angkatan }}</p>
                    <p><strong>Email:</strong> {{ $mahasiswa->email }}</p>
                </div>
            </div>
        </div>
    </div>
@endsection