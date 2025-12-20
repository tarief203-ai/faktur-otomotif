<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PembayaranController extends Controller
{
public function index()
{
    if (!auth()->check()) {
        return redirect('/login');
    }

    $user = auth()->user();

    $query = \Illuminate\Support\Facades\DB::table('pembayaran')
        ->join('pemilik', 'pembayaran.id_pemilik', '=', 'pemilik.id_pemilik')
        ->join('kendaraan', 'pembayaran.no_rangka', '=', 'kendaraan.no_rangka')
        // Ganti 'pemilik.nama_pemilik' menjadi 'pemilik.nama' (sesuai tabel Anda)
        ->select('pembayaran.*', 'pemilik.nama', 'kendaraan.merk');

    if ($user->role == 'staff') {
        $query->where('pembayaran.user_id', $user->id);
    }

    $pembayarans = $query->get();

    return view('pembayaran.index', compact('pembayarans'));
}

    // --- FUNGSI EDIT (MENAMPILKAN FORM) ---
    public function edit($id)
{
    $data = DB::table('pembayaran')->where('no_faktur', $id)->first();

    if (!$data) {
        return redirect('/pembayaran')->with('error', 'Data tidak ditemukan!');
    }

    // CEK OTORISASI: Jika dia Staff dan bukan miliknya, usir!
    if (auth()->user()->role == 'staff' && $data->user_id != auth()->id()) {
        return redirect('/pembayaran')->with('error', 'Anda tidak diizinkan mengubah data orang lain!');
    }

    $pemiliks = DB::table('pemilik')->get();
    $kendaraans = DB::table('kendaraan')->get();

    return view('pembayaran.edit', compact('data', 'pemiliks', 'kendaraans'));
}

    // --- FUNGSI UPDATE (SIMPAN PERUBAHAN) ---
    public function update(Request $request, $id)
    {
        DB::table('pembayaran')->where('no_faktur', $id)->update([
            'no_pupd'        => $request->no_pupd,
            'tgl_pupd'       => $request->tgl_pupd,
            'harga'          => $request->harga,
            'terbilang'      => $request->terbilang,
            'tgl_pembayaran' => $request->tgl_pembayaran,
            'jumlah_unit'    => $request->jumlah_unit,
            'id_pemilik'     => $request->id_pemilik,
            'no_rangka'      => $request->no_rangka,
        ]);

        return redirect('/pembayaran')->with('success', 'Data pembayaran berhasil diperbarui!');
    }

    public function delete($id) 
    {
        DB::table('pembayaran')->where('no_faktur', $id)->delete();
        return redirect('/pembayaran')->with('success', 'Data pembayaran berhasil dihapus!');
    }

    public function detail($id)
    {
        $data = DB::table('pembayaran')
            ->join('pemilik', 'pembayaran.id_pemilik', '=', 'pemilik.id_pemilik')
            ->join('kendaraan', 'pembayaran.no_rangka', '=', 'kendaraan.no_rangka')
            ->select('pembayaran.*', 'pemilik.nama', 'kendaraan.merk', 'kendaraan.model', 'kendaraan.warna')
            ->where('pembayaran.no_faktur', $id)
            ->first();

        return view('pembayaran.detail', compact('data'));
    }
    public function cetak($id)
{
    $data = DB::table('pembayaran')
        ->join('kendaraan', 'pembayaran.no_rangka', '=', 'kendaraan.no_rangka')
        ->join('pemilik', 'pembayaran.id_pemilik', '=', 'pemilik.id_pemilik')
        ->select(
            'pembayaran.*', 
            'kendaraan.merk', 
            'kendaraan.model', // Sesuai dengan database Anda
            'kendaraan.warna', 
            'kendaraan.no_mesin', 
            'pemilik.nama', 
            'pemilik.alamat'
        )
        ->where('pembayaran.no_faktur', $id)
        ->first();

    if (!$data) {
        return redirect('/pembayaran')->with('error', 'Data tidak ditemukan!');
    }

    return view('pembayaran.cetak', compact('data'));
}
}