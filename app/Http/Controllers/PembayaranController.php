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

    // Query dasar untuk mengambil semua data
    $pembayarans = DB::table('pembayaran')
        ->join('pemilik', 'pembayaran.id_pemilik', '=', 'pemilik.id_pemilik')
        ->join('kendaraan', 'pembayaran.no_rangka', '=', 'kendaraan.no_rangka')
        ->select('pembayaran.*', 'pemilik.nama', 'kendaraan.merk')
        ->get(); // Tanpa filter user_id, jadi semua bisa lihat

    return view('pembayaran.index', compact('pembayarans'));
}

    public function create()
    {
        if (auth()->user()->role !== 'admin') {
            return redirect('/pembayaran')->with('error', 'Hanya Admin yang boleh menambah data!');
        }

        $pemiliks = DB::table('pemilik')->get();
        $kendaraans = DB::table('kendaraan')->get();

        return view('pembayaran.create', compact('pemiliks', 'kendaraans'));
    }

    public function store(Request $request)
{
    if (auth()->user()->role !== 'admin') {
        return redirect('/pembayaran')->with('error', 'Aksi tidak diizinkan!');
    }

    // 1. Validasi: Cek apakah Pemilik sudah pernah membayar
    $cekPemilik = DB::table('pembayaran')
        ->where('id_pemilik', $request->id_pemilik)
        ->exists();

    if ($cekPemilik) {
        return redirect()->back()
            ->withInput()
            ->with('error', 'Gagal! Pemilik ini sudah memiliki riwayat transaksi pembayaran.');
    }

    // 2. Validasi: Cek apakah Kendaraan sudah pernah dibayar
    $cekKendaraan = DB::table('pembayaran')
        ->where('no_rangka', $request->no_rangka)
        ->exists();

    if ($cekKendaraan) {
        return redirect()->back()
            ->withInput()
            ->with('error', 'Gagal! Kendaraan ini sudah memiliki riwayat transaksi pembayaran.');
    }

    // Jika lolos validasi, simpan data
    DB::table('pembayaran')->insert([
        'no_faktur'      => $request->no_faktur,
        'no_pupd'        => $request->no_pupd,
        'tgl_pupd'       => $request->tgl_pupd,
        'harga'          => $request->harga,
        'terbilang'      => $request->terbilang,
        'tgl_pembayaran' => $request->tgl_pembayaran,
        'jumlah_unit'    => $request->jumlah_unit,
        'id_pemilik'     => $request->id_pemilik,
        'no_rangka'      => $request->no_rangka,
        'user_id'        => auth()->id(),
        'created_at'     => now(),
        'updated_at'     => now(),
    ]);

    return redirect('/pembayaran')->with('success', 'Data pembayaran berhasil ditambahkan!');
}

    public function edit($id)
    {
        $data = DB::table('pembayaran')->where('no_faktur', $id)->first();

        if (!$data) {
            return redirect('/pembayaran')->with('error', 'Data tidak ditemukan!');
        }

        if (auth()->user()->role == 'staff' && $data->user_id != auth()->id()) {
            return redirect('/pembayaran')->with('error', 'Anda tidak diizinkan mengubah data orang lain!');
        }

        $pemiliks = DB::table('pemilik')->get();
        $kendaraans = DB::table('kendaraan')->get();

        return view('pembayaran.edit', compact('data', 'pemiliks', 'kendaraans'));
    }

    public function update(Request $request, $id)
    {
        // Pastikan fungsi update ini ada di sini
        DB::table('pembayaran')->where('no_faktur', $id)->update([
            'no_pupd'        => $request->no_pupd,
            'tgl_pupd'       => $request->tgl_pupd,
            'harga'          => $request->harga,
            'terbilang'      => $request->terbilang,
            'tgl_pembayaran' => $request->tgl_pembayaran,
            'jumlah_unit'    => $request->jumlah_unit,
            'id_pemilik'     => $request->id_pemilik,
            'no_rangka'      => $request->no_rangka,
            'updated_at'     => now(),
        ]);

        return redirect('/pembayaran')->with('success', 'Data pembayaran berhasil diperbarui!');
    }

    public function delete($id) 
    {
        if (auth()->user()->role !== 'admin') {
            return redirect('/pembayaran')->with('error', 'Hanya Admin yang boleh menghapus data!');
        }

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
                'kendaraan.model', 
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