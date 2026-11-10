<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\BerandaController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DosenController;
use App\Http\Controllers\KrsController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\MataKuliahController;
use App\Http\Controllers\PenggunaController;
use Illuminate\Support\Facades\Route;

// Halaman untuk pengguna yang belum login
Route::middleware('guest')->group(function () {
    Route::get('/login', [LoginController::class, 'showLoginForm'])
        ->name('login');

    Route::post('/login', [LoginController::class, 'authenticate'])
        ->name('login.attempt');
});

// Halaman internal yang memerlukan autentikasi
Route::middleware(['auth', 'prevent-back-history'])->group(function () {

    // Halaman utama
    Route::get('/', fn () => redirect()->route('dashboard'));

    Route::post('/logout', [LoginController::class, 'logout'])
        ->name('logout');

    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->name('dashboard');

    // =====================================
    // MANAJEMEN DATA MAHASISWA
    // =====================================

    // Endpoint DataTables Server-Side Mahasiswa
    Route::get('/mahasiswa/data', [MahasiswaController::class, 'data'])
        ->name('mahasiswa.data');

    // Khusus admin: tambah, simpan, edit, update, hapus mahasiswa
    Route::middleware('role:admin')->group(function () {
        Route::resource('mahasiswa', MahasiswaController::class)
            ->except(['index', 'show']);
    });

    // Semua pengguna login: daftar dan detail mahasiswa
    Route::resource('mahasiswa', MahasiswaController::class)
        ->only(['index', 'show']);

    // =====================================
    // MANAJEMEN DATA MATA KULIAH
    // =====================================

    // Endpoint DataTables Server-Side Mata Kuliah
    Route::get('/matakuliah/data', [MataKuliahController::class, 'data'])
        ->name('matakuliah.data');

    // Khusus admin: tambah, simpan, edit, update, hapus mata kuliah
    Route::middleware('role:admin')->group(function () {
        Route::resource('matakuliah', MataKuliahController::class)
            ->except(['index', 'show']);
    });

    // Semua pengguna login: daftar dan detail mata kuliah
    Route::resource('matakuliah', MataKuliahController::class)
        ->only(['index', 'show']);

   // Data KRS
    Route::get('krs/data', [KrsController::class, 'data'])->name('krs.data');   
    Route::resource('krs', KrsController::class);

    // Beranda
    Route::get('/beranda', [BerandaController::class, 'index'])
        ->name('beranda');

    // =====================================
    // MANAJEMEN DATA DOSEN
    // =====================================

    // Endpoint DataTables Dosen
    Route::get('/dosen/data', [DosenController::class, 'data'])
        ->name('dosen.data');

    // Khusus admin: tambah, simpan, edit, update, hapus dosen
    Route::middleware('role:admin')->group(function () {
        Route::resource('dosen', DosenController::class)
            ->except(['index', 'show']);
    });

    // Semua pengguna login: daftar dan detail dosen
    Route::resource('dosen', DosenController::class)
        ->only(['index', 'show']);

    // =====================================
    // MANAJEMEN PENGGUNA
    // =====================================

    Route::get('/pengguna', [PenggunaController::class, 'index'])
        ->middleware('role:admin')
        ->name('pengguna.index');

});