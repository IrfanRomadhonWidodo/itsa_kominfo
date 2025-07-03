<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Pages\ContactController;
use App\Http\Controllers\Pages\TentangKamiController;
use App\Http\Controllers\Pages\DownloadController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('auth.login');
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

//Pages Routes
Route::get('/kontak', [ContactController::class, 'index'])->name('contact');
Route::get('/tentang-kami', [TentangKamiController::class, 'index'])->name('tentang-kami');
    // dokumen download
    Route::get('/download', [DownloadController::class, 'index'])->name('download');
    Route::get('/download/word', [DownloadController::class, 'downloadWord'])->name('download.word');
require __DIR__.'/auth.php';
