<?php

use App\Http\Controllers\KategoriController;
use App\Http\Controllers\LevelController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

// Rute Halaman Utama
Route::get('/', function () {
    return redirect()->route('kategori.index');
});

// Rute Level
Route::get('/level', [LevelController::class, 'index']);

// Rute Kategori (Menggunakan resource)
Route::resource('kategori', KategoriController::class);


// Rute Tambahan Kategori (Jika diperlukan)
Route::get('/kategori/data', [KategoriController::class, 'getData'])->name('kategori.data');

// Rute User
Route::get('/user', [UserController::class, 'index']);
Route::get('/user/tambah', [UserController::class, 'tambah']);
Route::post('/user/tambah_simpan', [UserController::class, 'tambah_simpan']);
Route::get('/user/ubah/{id}', [UserController::class, 'ubah']);
Route::put('/user/ubah_simpan/{id}', [UserController::class, 'ubah_simpan']);
Route::delete('/user/hapus/{id}', [UserController::class, 'hapus']);
Route::get('/kategori/edit', [KategoriController::class, 'edit'])->name('kategori.edit');
Route::get('/kategori/destroy', [KategoriController::class, 'edit'])->name('kategori.destroy');

