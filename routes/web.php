<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;

// Halaman utama (menampilkan gambar)
Route::get('/', [BlogController::class, 'index'])->name('home');

// Halaman form upload
Route::get('/upload', [BlogController::class, 'create'])->name('upload.form');

// Proses upload gambar
Route::post('/upload', [BlogController::class, 'store'])->name('upload.image');

Route::get('/products', [BlogController::class, 'products'])->name('products');

Route::get('/products/{id}', [BlogController::class, 'show'])->name('products.show');
