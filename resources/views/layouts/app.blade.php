<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-bs-theme="light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'SIAKAD') | {{ config('app.name') }}</title>

    <link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/bootstrap-icons/bootstrap-icons.min.css') }}" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css" rel="stylesheet">
    <link href="{{ asset('css/siakad.css') }}" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    @stack('styles')
</head>
<body class="bg-body-tertiary">
    @include('layouts.partials.navbar')

    <div class="container-fluid">
        <div class="row">
            @include('layouts.partials.sidebar')

            <main class="col-lg-9 col-xl-10 px-3 px-md-4 py-4">
                {{-- @include('layouts.partials.flash') --> Sengaja dinonaktifkan agar tidak bentrok dengan SweetAlert toast --}}
                @yield('content')

                <footer class="text-center text-body-secondary small mt-5">
                    &copy; {{ date('Y') }} {{ config('app.name') }}
                    - D3 Teknik Informatika
                </footer>
            </main>
        </div>
    </div>
    
    <!-- jQuery dan DataTables JS (Wajib dimuat paling awal di bawah) -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
    
    <!-- SweetAlert2 JS -->
    <script src="{{ asset('vendor/sweetalert2/sweetalert2.all.min.js') }}"></script>

    @if(session('success'))
    <script>
        Swal.fire({
            toast: true,
            position: 'top-end',
            icon: 'success',
            title: @json(session('success')),
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true
        });
    </script>
    @endif

    @if(session('error'))
    <script>
        Swal.fire({
            toast: true,
            position: 'top-end',
            icon: 'error',
            title: @json(session('error')),
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true
        });
    </script>
    @endif

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const html = document.documentElement;
            const button = document.getElementById('themeToggle');
            if (!button) return;
            button.addEventListener('click', function () {
                const temaSaatIni = html.getAttribute('data-bs-theme');
                const temaBaru = temaSaatIni === 'dark' ? 'light' : 'dark';
                html.setAttribute('data-bs-theme', temaBaru);
                button.innerHTML = temaBaru === 'dark'
                    ? '<i class="bi bi-sun-fill"></i>'
                    : '<i class="bi bi-moon-fill"></i>';
            });
        });
    </script>

    @stack('scripts')

</body>
</html>