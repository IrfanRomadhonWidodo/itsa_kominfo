<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Pages\ContactController;
use App\Http\Controllers\Pages\TentangKamiController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

//Pages Routes
Route::get('/kontak', [ContactController::class, 'index'])->name('contact');
Route::get('/tentang-kami', [TentangKamiController::class, 'index'])->name('tentang-kami');
require __DIR__.'/auth.php';
