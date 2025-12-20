<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // Tambahkan ini

class CheckLogin
{
    public function handle(Request $request, Closure $next)
    {
        // Ganti pengecekan session manual dengan Auth::check()
        if (!Auth::check()) {
            // Jika user belum terautentikasi oleh sistem Laravel
            return redirect('/login')->with('error', 'Silakan login terlebih dahulu!');
        }

        return $next($request);
    }
}