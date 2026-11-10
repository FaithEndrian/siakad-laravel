@extends('layouts.guest')

@section('title', 'Akses Ditolak (403)')

@section('content')
<div class="text-center py-4">
    <div class="mb-3">
        <i class="bi bi-shield-exclamation display-1 text-danger"></i>
    </div>
    <h1 class="display-5 fw-bold text-dark">403</h1>
    <h2 class="h4 fw-semibold text-secondary mb-3">Akses Ditolak</h2>

    <p class="text-muted mb-4 px-3">
        Maaf, Anda tidak memiliki hak akses yang sah untuk membuka halaman ini. Silakan kembali ke halaman utama atau hubungi administrator sistem.
    </p>
    <div>
        <a href="{{ url('/') }}" class="btn btn-primary px-4 py-2">
            <i class="bi bi-arrow-left me-2"></i>Kembali ke Dashboard
        </a>
    </div>
</div>
@endsection
