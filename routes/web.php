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

use App\Http\Controllers\KendaraanController;

// Route Kendaraan
Route::get('/kendaraan', [KendaraanController::class, 'index']);
Route::get('/kendaraan/create', [KendaraanController::class, 'create']);
Route::post('/kendaraan/store', [KendaraanController::class, 'store']);
Route::get('/kendaraan/edit/{id}', [KendaraanController::class, 'edit']);
Route::post('/kendaraan/update/{id}', [KendaraanController::class, 'update']);
Route::get('/kendaraan/delete/{id}', [KendaraanController::class, 'destroy']);

use App\Http\Controllers\PembayaranController;

Route::get('/pembayaran', [PembayaranController::class, 'index']);
Route::get('/pembayaran/delete/{id}', [PembayaranController::class, 'destroy']);
Route::get('/pembayaran/create', [PembayaranController::class, 'create']);
Route::post('/pembayaran/store', [PembayaranController::class, 'store']);
Route::get('/pembayaran/cetak/{id}', [PembayaranController::class, 'cetak']);
Route::get('/pembayaran/detail/{id}', [PembayaranController::class, 'detail']);