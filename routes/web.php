<?php

use App\Http\Controllers\PemilikController;

// Halaman Utama & Tambah
Route::get('/pemilik', [PemilikController::class, 'index']);
Route::get('/pemilik/create', [PemilikController::class, 'create']);
Route::post('/pemilik/store', [PemilikController::class, 'store']);

// Ubah & Hapus
Route::get('/pemilik/edit/{id}', [PemilikController::class, 'edit']);
Route::post('/pemilik/update/{id}', [PemilikController::class, 'update']);
Route::get('/pemilik/delete/{id}', [PemilikController::class, 'destroy']);