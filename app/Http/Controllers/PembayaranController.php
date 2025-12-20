<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PembayaranController extends Controller
{
    public function index() 
    {
        // Join tabel untuk mendapatkan Nama Pemilik dan Merk Kendaraan
        $pembayarans = DB::table('pembayaran')
            ->join('pemilik', 'pembayaran.id_pemilik', '=', 'pemilik.id_pemilik')
            ->join('kendaraan', 'pembayaran.no_rangka', '=', 'kendaraan.no_rangka')
            ->select(
                'pembayaran.*', 
                'pemilik.nama', 
                'kendaraan.merk'
            )
            ->get();

        return view('pembayaran.index', compact('pembayarans'));
    }

    public function create() 
    {
        $pemiliks = DB::table('pemilik')->get();
        $kendaraans = DB::table('kendaraan')->get();
        
        return view('pembayaran.create', compact('pemiliks', 'kendaraans'));
    }

    public function store(Request $request) 
    {
        $request->validate([
            'no_faktur' => 'required',
            'no_rangka' => 'required',
            'id_pemilik' => 'required',
            'harga' => 'required|numeric'
        ]);

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
        ]);

        return redirect('/pembayaran')->with('success', 'Pembayaran berhasil disimpan!');
    }

    // --- FUNGSI EDIT (MENAMPILKAN FORM) ---
    public function edit($id)
    {
        // Ambil data pembayaran berdasarkan no_faktur
        $data = DB::table('pembayaran')->where('no_faktur', $id)->first();
        
        // Ambil data dropdown
        $pemiliks = DB::table('pemilik')->get();
        $kendaraans = DB::table('kendaraan')->get();

        if (!$data) {
            return redirect('/pembayaran')->with('error', 'Data tidak ditemukan!');
        }

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
}