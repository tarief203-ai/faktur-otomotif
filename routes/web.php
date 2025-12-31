<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PemilikController;
use App\Http\Controllers\KendaraanController;
use App\Http\Controllers\PembayaranController;
use App\Http\Controllers\DashboardController;

/*
|--------------------------------------------------------------------------
| 1. Authentikasi (Login & Logout) - Bisa diakses tanpa login
|--------------------------------------------------------------------------
*/
Route::get('/login', [AuthController::class, 'index'])->name('login');
Route::post('/login/proses', [AuthController::class, 'login']);
Route::get('/logout', [AuthController::class, 'logout']);

/*
|--------------------------------------------------------------------------
| 2. Route Terproteksi (Wajib Login)
|--------------------------------------------------------------------------
*/
Route::middleware([\App\Http\Middleware\CheckLogin::class])->group(function () {

    // DASHBOARD (Bisa diakses Admin & Staff)
    Route::get('/', [DashboardController::class, 'index']);
    Route::get('/dashboard', [DashboardController::class, 'index']);

    /*
    |-----------------------------------------------------------------------
    | KHUSUS ADMIN: Pemilik & Kendaraan
    | Proteksi menggunakan Route::group agar tidak error Closure
    |-----------------------------------------------------------------------
    */
    Route::group(['middleware' => [function ($request, $next) {
        if (strtolower(auth()->user()->role) !== 'admin') {
            abort(403, 'Hanya Admin yang diizinkan mengakses halaman ini!');
        }
        return $next($request);
    }]], function () {

        // --- Route Pemilik ---
        Route::prefix('pemilik')->group(function () {
            Route::get('/', [PemilikController::class, 'index']);
            Route::get('/create', [PemilikController::class, 'create']);
            Route::post('/store', [PemilikController::class, 'store']);
            Route::get('/edit/{id}', [PemilikController::class, 'edit']);
            Route::post('/update/{id}', [PemilikController::class, 'update']);
            Route::get('/delete/{id}', [PemilikController::class, 'destroy']);
        });

        // --- Route Kendaraan ---
        Route::prefix('kendaraan')->group(function () {
            Route::get('/', [KendaraanController::class, 'index']);
            Route::get('/create', [KendaraanController::class, 'create']);
            Route::post('/store', [KendaraanController::class, 'store']);
            Route::get('/edit/{id}', [KendaraanController::class, 'edit']);
            Route::post('/update/{id}', [KendaraanController::class, 'update']);
            Route::get('/delete/{id}', [KendaraanController::class, 'destroy']);
        });
    });

    /*
    |-----------------------------------------------------------------------
    | ADMIN & STAFF: Pembayaran
    |-----------------------------------------------------------------------
    */
    Route::prefix('pembayaran')->group(function () {
        Route::get('/', [PembayaranController::class, 'index']);
        Route::get('/create', [PembayaranController::class, 'create']);
        Route::post('/store', [PembayaranController::class, 'store']);
        Route::get('/edit/{id}', [PembayaranController::class, 'edit']);
        Route::post('/update/{id}', [PembayaranController::class, 'update']);
        Route::get('/delete/{id}', [PembayaranController::class, 'delete']);
        Route::get('/cetak/{id}', [PembayaranController::class, 'cetak']);
        Route::get('/detail/{id}', [PembayaranController::class, 'detail']);
    });

});