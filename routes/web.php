<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\KecamatanController;
use App\Http\Controllers\Admin\CamatController;
use App\Http\Controllers\Admin\DesaController;
use App\Http\Controllers\Admin\KepalaDesaController;
use App\Http\Controllers\Admin\KegiatanController;
use App\Http\Controllers\Admin\LaporanController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Camat\DashboardController as CamatDashboardController;
use App\Http\Controllers\Camat\DesaController as CamatDesaController;
use App\Http\Controllers\Desa\DashboardController as DesaDashboardController;
use App\Http\Controllers\Desa\KegiatanController as DesaKegiatanController;
use Illuminate\Support\Facades\Route;

// Public routes
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/kegiatan/{id}', [HomeController::class, 'detail'])->name('kegiatan.detail');

// Guest routes
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [LoginController::class, 'login'])->name('login.submit');


// Authenticated routes
Route::middleware('auth')->group(function () {
    // Admin Dashboard
    Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
    
    // Logout
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

    // User Routes
    Route::prefix('admin/users')->name('admin.users.')->group(function () {
        Route::get('/', [UserController::class, 'index'])->name('index');
        Route::get('/create', [UserController::class, 'create'])->name('create');
        Route::post('/store', [UserController::class, 'store'])->name('store');
        Route::get('/{user}/edit', [UserController::class, 'edit'])->name('edit');
        Route::put('/{user}', [UserController::class, 'update'])->name('update');
        Route::delete('/{user}', [UserController::class, 'destroy'])->name('destroy');
    });

    // Kecamatan Routes
    Route::prefix('admin/kecamatan')->name('admin.kecamatan.')->group(function () {
        Route::get('/', [KecamatanController::class, 'index'])->name('index');
        Route::get('/create', [KecamatanController::class, 'create'])->name('create');
        Route::post('/store', [KecamatanController::class, 'store'])->name('store');
        Route::get('/{kecamatan}/edit', [KecamatanController::class, 'edit'])->name('edit');
        Route::put('/{kecamatan}', [KecamatanController::class, 'update'])->name('update');
        Route::delete('/{kecamatan}', [KecamatanController::class, 'destroy'])->name('destroy');
        Route::post('/{kecamatan}/create-akun', [KecamatanController::class, 'createAkun'])->name('createAkun');
        Route::post('/{kecamatan}/reset-password', [KecamatanController::class, 'resetPassword'])->name('resetPassword');
    });

    // Desa Routes
    Route::prefix('admin/desa')->name('admin.desa.')->group(function () {
        Route::get('/', [DesaController::class, 'index'])->name('index');
        Route::get('/create', [DesaController::class, 'create'])->name('create');
        Route::post('/store', [DesaController::class, 'store'])->name('store');
        Route::get('/{desa}/edit', [DesaController::class, 'edit'])->name('edit');
        Route::put('/{desa}', [DesaController::class, 'update'])->name('update');
        Route::delete('/{desa}', [DesaController::class, 'destroy'])->name('destroy');
        Route::post('/{desa}/create-akun', [DesaController::class, 'createAkun'])->name('createAkun');
        Route::post('/{desa}/reset-password', [DesaController::class, 'resetPassword'])->name('resetPassword');
    });

    // Kepala Desa Routes
    Route::prefix('admin/kepala-desa')->name('admin.kepala-desa.')->group(function () {
        Route::get('/', [KepalaDesaController::class, 'index'])->name('index');
        Route::get('/create', [KepalaDesaController::class, 'create'])->name('create');
        Route::post('/store', [KepalaDesaController::class, 'store'])->name('store');
        Route::get('/{kepala_desa}/edit', [KepalaDesaController::class, 'edit'])->name('edit');
        Route::put('/{kepala_desa}', [KepalaDesaController::class, 'update'])->name('update');
        Route::delete('/{kepala_desa}', [KepalaDesaController::class, 'destroy'])->name('destroy');
    });

    // Camat Routes
    Route::prefix('admin/camat')->name('admin.camat.')->group(function () {
        Route::get('/', [CamatController::class, 'index'])->name('index');
        Route::get('/create', [CamatController::class, 'create'])->name('create');
        Route::post('/store', [CamatController::class, 'store'])->name('store');
        Route::get('/{camat}/edit', [CamatController::class, 'edit'])->name('edit');
        Route::put('/{camat}', [CamatController::class, 'update'])->name('update');
        Route::delete('/{camat}', [CamatController::class, 'destroy'])->name('destroy');
    });

    // Kegiatan Routes
    Route::prefix('admin/kegiatan')->name('admin.kegiatan.')->group(function () {
        Route::get('/', [KegiatanController::class, 'index'])->name('index');
        Route::get('/create', [KegiatanController::class, 'create'])->name('create');
        Route::post('/store', [KegiatanController::class, 'store'])->name('store');
        Route::get('/{kegiatan}/edit', [KegiatanController::class, 'edit'])->name('edit');
        Route::put('/{kegiatan}', [KegiatanController::class, 'update'])->name('update');
        Route::delete('/{kegiatan}', [KegiatanController::class, 'destroy'])->name('destroy');
    });

    // Laporan Routes
    Route::prefix('admin/laporan')->name('admin.laporan.')->group(function () {
        Route::get('/', [LaporanController::class, 'index'])->name('index');
        Route::get('/kecamatan/pdf', [LaporanController::class, 'kecamatanPdf'])->name('kecamatan.pdf');
        Route::get('/camat/pdf', [LaporanController::class, 'camatPdf'])->name('camat.pdf');
        Route::get('/desa/pdf', [LaporanController::class, 'desaPdf'])->name('desa.pdf');
        Route::get('/kepala-desa/pdf', [LaporanController::class, 'kepalaDesaPdf'])->name('kepala-desa.pdf');
        Route::get('/kegiatan/pdf', [LaporanController::class, 'kegiatanPdf'])->name('kegiatan.pdf');
    });

    // Councillor Dashboard Routes
    Route::prefix('camat')->name('camat.')->group(function () {
        Route::get('/dashboard', [CamatDashboardController::class, 'index'])->name('dashboard');
        Route::get('/desa', [CamatDesaController::class, 'index'])->name('desa.index');
        Route::get('/desa/create', [CamatDesaController::class, 'create'])->name('desa.create');
        Route::post('/desa', [CamatDesaController::class, 'store'])->name('desa.store');
        Route::get('/desa/{desa}/edit', [CamatDesaController::class, 'edit'])->name('desa.edit');
        Route::put('/desa/{desa}', [CamatDesaController::class, 'update'])->name('desa.update');
        Route::delete('/desa/{desa}', [CamatDesaController::class, 'destroy'])->name('desa.destroy');
        Route::get('/kegiatan', [KegiatanController::class, 'index'])->name('kegiatan.index');
    });

    // Village Head Dashboard Routes
    Route::prefix('desa')->name('desa.')->group(function () {
        Route::get('/dashboard', [DesaDashboardController::class, 'index'])->name('dashboard');
        Route::get('/kegiatan/create', [DesaKegiatanController::class, 'create'])->name('kegiatan.create');
        Route::post('/kegiatan', [DesaKegiatanController::class, 'store'])->name('kegiatan.store');
        Route::get('/kegiatan/{kegiatan}/edit', [DesaKegiatanController::class, 'edit'])->name('kegiatan.edit');
        Route::put('/kegiatan/{kegiatan}', [DesaKegiatanController::class, 'update'])->name('kegiatan.update');
        Route::delete('/kegiatan/{kegiatan}', [DesaKegiatanController::class, 'destroy'])->name('kegiatan.destroy');
        Route::get('/kegiatan', [DesaKegiatanController::class, 'index'])->name('kegiatan.index');
    });
});
