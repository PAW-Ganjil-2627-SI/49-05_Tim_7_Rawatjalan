<?php

use App\Http\Controllers\RuangPoliController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Dashboard bawaan Breeze
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Route Ruang Poli diproteksi Auth dengan nama route yang jelas
Route::middleware(['auth'])->group(function () {
    Route::resource('ruang-poli', RuangPoliController::class);
});

require __DIR__.'/auth.php';
