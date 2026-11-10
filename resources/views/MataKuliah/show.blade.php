@extends('layouts.app')

@section('title', 'Detail Mata Kuliah')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-body fw-semibold d-flex justify-content-between align-items-center">
                    <span>Detail Data Mata Kuliah</span>
                    <a href="{{ route('matakuliah.index') }}" class="btn btn-secondary btn-sm">Kembali</a>
                </div>
                <div class="card-body">
                    <p><strong>Kode MK:</strong> {{ $matakuliah->kode_mk }}</p>
                    <p><strong>Nama Mata Kuliah:</strong> {{ $matakuliah->nama_mk }}</p>
                    <p><strong>SKS:</strong> {{ $matakuliah->sks }}</p>
                </div>
            </div>
        </div>
    </div>
@endsection