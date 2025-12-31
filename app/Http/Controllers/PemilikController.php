<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; // Penting untuk query database

class PemilikController extends Controller
{
    // Fungsi ini yang tadi dianggap tidak ada (undefined)
    public function index()
    {
        // Mengambil semua data dari tabel pemilik
        $pemiliks = DB::table('pemilik')->get();
        
        // Mengirim data ke view pemilik/index.blade.php
        return view('pemilik.index', compact('pemiliks'));
    }

    public function create()
    {
        return view('pemilik.create');
    }

    public function store(Request $request)
    {
        DB::table('pemilik')->insert([
            'id_pemilik' => $request->id_pemilik,
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'kode_pos' => $request->kode_pos
        ]);
        return redirect('/pemilik');
    }

    public function edit($id)
    {
        $pemilik = DB::table('pemilik')->where('id_pemilik', $id)->first();
        return view('pemilik.edit', compact('pemilik'));
    }

    public function update(Request $request, $id)
    {
        DB::table('pemilik')->where('id_pemilik', $id)->update([
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'kode_pos' => $request->kode_pos
        ]);
        return redirect('/pemilik');
    }

  public function destroy($id) {
    // GIVEN: Pemilik memiliki data di tabel pembayaran
    $adaPembayaran = DB::table('pembayaran')->where('id_pemilik', $id)->exists();

    if ($adaPembayaran) {
        // MAKA: Sistem harus error (tidak boleh dihapus)
        return redirect('/pemilik')->with('error', 'Data Pemilik gagal dihapus karena sudah memiliki transaksi pembayaran!');
    }

    // ELSE: Jika tidak ada relasi, barulah hapus
    DB::table('pemilik')->where('id_pemilik', $id)->delete();
    return redirect('/pemilik')->with('success', 'Data Pemilik berhasil dihapus!');
}
}