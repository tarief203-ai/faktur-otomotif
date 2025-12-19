<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckLogin
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next)
    {
        // Cek apakah session 'login' ada
        if (!$request->session()->has('login')) {
            // Jika tidak ada, tendang kembali ke halaman login
            return redirect('/login')->with('error', 'Silakan login terlebih dahulu!');
        }

        return $next($request);
    }
}