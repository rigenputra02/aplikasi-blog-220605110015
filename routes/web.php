<?php
use App\Http\Controllers\ArtikelController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KategoriArtikelController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PenulisController;
use Illuminate\Support\Facades\Route;

// Route untuk halaman login
Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'proses'])->name('login.proses')->middleware('guest');
// Route untuk logout
Route::post('/logout', [LoginController::class, 'logout'])->name('logout')->middleware('auth');
// Route yang dilindungi middleware auth
Route::middleware('auth')->group(function () {
    // Route untuk halaman dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    // Route resource untuk ketiga entitas
    Route::resource('artikel', ArtikelController::class)->except(['show']); Route::resource('penulis', PenulisController::class)->except(['show']);
    Route::resource('kategori', KategoriArtikelController::class)->except(['show']);
});

// Route Publik
Route::get('/', [LandingController::class, 'index'])
    ->name('beranda');

// Artikel berdasarkan kategori
Route::get('/kategori/{id}',
    [LandingController::class, 'kategori'])
    ->name('kategori.show');

// Detail artikel
Route::get('/artikel/{id}',
    [LandingController::class, 'show'])
    ->name('blog.artikel');
