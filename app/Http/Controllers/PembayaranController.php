<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PembayaranController extends Controller
{
    public function index()
    {
        $pembayarans = DB::table('pembayaran as pe')
            ->join('pemilik as p', 'pe.id_pemilik', '=', 'p.id_pemilik')
            ->join('kendaraan as k', 'pe.no_rangka', '=', 'k.no_rangka')
            ->select('p.id_pemilik', 'p.nama', 'k.no_rangka', 'pe.no_faktur', 'k.merk', 'pe.jumlah_unit', 'pe.harga')
            ->get();

        return view('pembayaran.index', compact('pembayarans'));
    }

    // --- TAMBAHKAN FUNGSI INI ---
    public function create()
    {
        // Ambil data untuk isi dropdown di form tambah
        $pemiliks = DB::table('pemilik')->get();
        $kendaraans = DB::table('kendaraan')->get();
        
        return view('pembayaran.create', compact('pemiliks', 'kendaraans'));
    }

    public function store(Request $request)
    {
        DB::table('pembayaran')->insert([
            'no_faktur'   => $request->no_faktur,
            'id_pemilik'  => $request->id_pemilik,
            'no_rangka'   => $request->no_rangka,
            'jumlah_unit' => $request->jumlah_unit,
            'harga'       => $request->harga,
        ]);

        return redirect('/pembayaran')->with('success', 'Pembayaran berhasil disimpan!');
    }
    // ----------------------------

    public function destroy($id)
    {
        DB::table('pembayaran')->where('no_faktur', $id)->delete();
        return redirect('/pembayaran')->with('success', 'Data berhasil dihapus');
    }
    public function cetak($id)
{
    $data = DB::table('pembayaran as p')
        ->join('kendaraan as k', 'p.no_rangka', '=', 'k.no_rangka')
        ->join('pemilik as pem', 'p.id_pemilik', '=', 'pem.id_pemilik')
        ->where('p.no_faktur', $id)
        ->first();

    if (!$data) {
        return redirect()->back()->with('error', 'Data tidak ditemukan');
    }

    return view('pembayaran.cetak', compact('data'));
}
}