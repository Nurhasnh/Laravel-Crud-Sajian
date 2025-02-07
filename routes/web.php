<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ArtikelController;
use App\Http\Controllers\ResepController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Dashboard dengan autentikasi & verifikasi email
Route::middleware(['auth', 'verified'])->group(function () {
    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Manajemen Profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // CRUD Artikel
    Route::resource('artikel', ArtikelController::class)->except(['show']);
    Route::get('/artikel/{artikel}', [ArtikelController::class, 'show'])->name('artikel.show');

    // CRUD Resep
    Route::resource('resep', ResepController::class)->except(['show']);
    Route::get('/resep/{resep}', [ResepController::class, 'show'])->name('resep.show');
});

require __DIR__.'/auth.php';
