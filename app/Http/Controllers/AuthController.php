<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    // Tampilkan halaman login
    public function index() {
        // Jika user sudah login, arahkan langsung ke dashboard
        if (Auth::check()) {
            return redirect('/dashboard');
        }
        return view('login');
    }

    public function login(Request $request) {
        // 1. Validasi input
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        // 2. Siapkan data login (menggunakan email dari input 'username')
        $credentials = [
            'email'    => trim($request->username), 
            'password' => $request->password
        ];

        // 3. Proses Autentikasi
        if (Auth::attempt($credentials)) {
            // Wajib dijalankan untuk mencegah session fixation attack
            $request->session()->regenerate();
            
            // Opsional: Simpan data ke session manual jika dibutuhkan di view
            Session::put('nama', Auth::user()->name);
            Session::put('role', Auth::user()->role);
            
            // Arahkan ke dashboard atau halaman yang dituju sebelumnya
            return redirect()->intended('/dashboard');
        }

        // 4. Jika gagal, kirim pesan error
        return back()->with('error', 'Email atau Password salah!');
    }

    public function logout(Request $request) {
        // Logout dari sistem Auth Laravel
        Auth::logout();
        
        // Hapus semua session terkait user ini
        $request->session()->invalidate();
        
        // Buat ulang token CSRF baru
        $request->session()->regenerateToken();
        
        return redirect('/login');
    }
}