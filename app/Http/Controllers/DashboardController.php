<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        // Menghitung data dari database
        $total_pemilik = DB::table('pemilik')->count();
        $total_kendaraan = DB::table('kendaraan')->count();
        $total_pembayaran = DB::table('pembayaran')->count();
        
        // Menghitung total pendapatan (opsional)
        $total_pendapatan = DB::table('pembayaran')->sum('harga');

        // Mengirim data ke view dashboard
        return view('dashboard', compact(
            'total_pemilik', 
            'total_kendaraan', 
            'total_pembayaran', 
            'total_pendapatan'
        ));
    }
}