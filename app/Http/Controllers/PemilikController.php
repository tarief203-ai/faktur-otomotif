<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PemilikController extends Controller 
{
    // REVISI: Bagian __construct dihapus karena proteksi sudah ada di web.php

    public function index()
    {
        $pemiliks = DB::table('pemilik')->get();
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
        return redirect('/pemilik')->with('success', 'Data Pemilik berhasil ditambah!');
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
        return redirect('/pemilik')->with('success', 'Data Pemilik berhasil diupdate!');
    }

    public function destroy($id) 
    {
        $adaPembayaran = DB::table('pembayaran')->where('id_pemilik', $id)->exists();

        if ($adaPembayaran) {
            return redirect('/pemilik')->with('error', 'Data Pemilik gagal dihapus karena sudah memiliki transaksi pembayaran!');
        }

        DB::table('pemilik')->where('id_pemilik', $id)->delete();
        return redirect('/pemilik')->with('success', 'Data Pemilik berhasil dihapus!');
    }
}