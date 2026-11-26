<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PasienController;
use App\Http\Controllers\DokterController;
use App\Http\Controllers\RuangPoliController;
use App\Http\Controllers\obatController;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.proses');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/logout', fn () => redirect('/'));

Route::get('/pasien', [PasienController::class, 'index'])->name('pasien.index');
Route::get('/pasien/daftar', [PasienController::class, 'index'])->name('pasien.daftar');
Route::get('/dokter', [DokterController::class, 'index'])->name('dokter.index');
Route::get('/ruang-poli', [RuangPoliController::class, 'index'])->name('ruang-poli.index');
Route::get('/ruangan', [RuangPoliController::class, 'index'])->name('ruangan.index');
Route::get('/obat', [obatController::class, 'index'])->name('obat.index');

Route::middleware(['auth'])->group(function () {

    Route::middleware(['can:kelola-pasien'])->group(function () {
        Route::get('/pasien/tambah', function () {
            return view('pasien.index');
        })->name('pasien.form');
        Route::resource('pasien', PasienController::class)->except(['index', 'show']);
    });

    Route::middleware(['can:kelola-dokter'])->group(function () {
        Route::get('/dokter/tambah', [DokterController::class, 'create'])->name('dokter.tambah');
        Route::resource('dokter', DokterController::class)->except(['index', 'show']);
    });

    Route::middleware(['can:kelola-ruangan'])->group(function () {
        Route::resource('ruang-poli', RuangPoliController::class)->except(['index', 'show']);
    });

    Route::middleware(['can:kelola-obat'])->group(function () {
        Route::resource('obat', obatController::class)->except(['index', 'show']);
    });
});