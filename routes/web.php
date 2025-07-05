<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Pages\KontakController;
use App\Http\Controllers\Pages\TentangKamiController;
use App\Http\Controllers\Pages\DownloadController;
use App\Http\Controllers\Auth\GoogleController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\UserAdminController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('auth.login');
});

// Admin Routes (terproteksi dengan middleware auth dan verified)
Route::middleware(['auth', 'verified'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');
    
    // Tambahkan route admin lainnya di sini
    Route::resource('users', UserAdminController::class);
    // Route::resource('content', AdminContentController::class);
    // Route::get('settings', [AdminSettingsController::class, 'index'])->name('settings');
    // Route::get('reports', [AdminReportsController::class, 'index'])->name('reports');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    // profil user
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

});

//Lupa Password Kirim Email
Route::get('/forgot-password', [\App\Http\Controllers\Auth\PasswordResetLinkController::class, 'create'])
    ->middleware('guest')
    ->name('password.request');

Route::post('/forgot-password', [\App\Http\Controllers\Auth\PasswordResetLinkController::class, 'store'])
    ->middleware('guest')
    ->name('password.email');


//Feedback dan Kontak
Route::get('/kontak', [KontakController::class, 'index'])->name('kontak');
Route::middleware(['auth'])->group(function() {
    Route::post('/kontak/feedback', [KontakController::class, 'storeFeedback'])
        ->name('kontak.feedback');
});

//Tentang ITSA
Route::get('/tentang-kami', [TentangKamiController::class, 'index'])->name('tentang-kami');

//Download PDF
Route::get('/download', [DownloadController::class, 'index'])->name('download');
Route::get('/download/word', [DownloadController::class, 'downloadWord'])->name('download.word');

//Login dengan Google
Route::get('/auth/google', [GoogleController::class, 'redirectToGoogle'])->name('google.login');
Route::get('/auth/google/callback', [GoogleController::class, 'handleGoogleCallback']);

require __DIR__.'/auth.php';
