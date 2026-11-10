@extends('layouts.guest')

@section('title', 'Masuk')

@section('content')
<div class="text-center mb-4">
    <i class="bi bi-mortarboard-fill display-5 text-primary"></i>
    <h1 class="h3 fw-bold mb-1">{{ config('app.name') }}</h1>
    <p class="text-body-secondary mb-0">Politeknik Negeri Pontianak</p>
</div>

@include('layouts.partials.flash')
<div class="card border-0 shadow-sm">
    <div class="card-body p-4">
        <h2 class="h5 mb-3">Masuk ke akun Anda</h2>

        <form method="POST" action="{{ route('login.attempt') }}" novalidate>
            @csrf
            <div class="mb-3">
                <x-form-input label="Email" name="email" type="email" 
                              autocomplete="username" required autofocus />
            </div>
            <div class="mb-3 position-relative">
                <x-form-input label="Kata Sandi" name="password" type="password" 
                              autocomplete="current-password" required />
                <button type="button" id="togglePassword" class="btn btn-link text-muted position-absolute
                 end-0 top-50 translate-middle-y text-decoration-none pe-3" style="padding-top: 1.8rem;">
                    <i class="bi bi-eye" id="toggleIcon"></i>
                </button>
            </div>

            <div class="form-check mb-3">
                <input class="form-check-input" type="checkbox" 
                       name="remember" id="remember">
                <label class="form-check-label" for="remember">Ingat saya</label>
            </div>
            <button type="submit" class="btn btn-primary w-100">Masuk</button>
        </form>
    </div>
</div>

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const passwordInput = document.querySelector('input[name="password"]');
        const toggleButton = document.getElementById('togglePassword');
        const toggleIcon = document.getElementById('toggleIcon');

        if (passwordInput && toggleButton) {
            toggleButton.addEventListener('click', function () {
                const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
                passwordInput.setAttribute('type', type);
                if (type === 'password') {
                    toggleIcon.classList.remove('bi-eye-slash');
                    toggleIcon.classList.add('bi-eye');
                } else {
                    toggleIcon.classList.remove('bi-eye');
                    toggleIcon.classList.add('bi-eye-slash');
                }
            });
        }
    });
</script>
@endpush
@endsection