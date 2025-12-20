<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function index() {
        return view('login');
    }

    public function login(Request $request) {
        // Login Simpel: admin / 12345
        if ($request->username == 'admin' && $request->password == '12345') {
            Session::put('login', true);
            Session::put('nama', 'The Vos Admin');
            return redirect('/dashboard');
        }

        return back()->with('error', 'Username atau Password salah!');
    }

    public function logout() {
        Session::flush();
        return redirect('/login');
    }
}