<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    if (auth()->user()->role === 'seller') {
        return redirect()->route('seller.dashboard');
    }
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// TaniBantu Routes (Public Access)
Route::get('/jadwal', function () {
    return view('jadwal');
});

Route::get('/harga', function () {
    return view('harga');
});

Route::get('/forum', function () {
    return view('forum');
});

// Marketplace Routes
Route::get('/toko', function () {
    return view('toko');
});

Route::get('/toko/detail/{id?}', function ($id = null) {
    return view('toko-detail', ['id' => $id]);
});

// Route Profil (Protected by Auth)
Route::middleware('auth')->group(function () {
    Route::get('/profil', function () {
        return view('profil');
    });
});

// Seller Dashboard
Route::get('/seller/dashboard', function() {
    return view('seller.dashboard');
})->middleware(['auth', 'verified'])->name('seller.dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
