<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KendaraanController extends Controller
{
    public function index() {
        $kendaraans = DB::table('kendaraan')->get();
        return view('kendaraan.index', compact('kendaraans'));
    }

    public function create() {
        return view('kendaraan.create');
    }

public function store(Request $request) {
    DB::table('kendaraan')->insert([
        'no_rangka'   => $request->no_rangka,
        'merk'        => $request->merk,
        'tipe'        => $request->tipe,
        'model'       => $request->model,       // Mengambil dari name="model"
        'tahun_model' => $request->tahun_model, // Mengambil dari name="tahun_model"
        'warna'       => $request->warna,
        'no_mesin'    => $request->no_mesin,
    ]);
    return redirect('/kendaraan')->with('success', 'Data Kendaraan berhasil ditambah!');
}
    public function edit($id) {
        $k = DB::table('kendaraan')->where('no_rangka', $id)->first();
        return view('kendaraan.edit', compact('k'));
    }

    public function update(Request $request, $id) {
    // Pastikan menggunakan $request->tahun_model sesuai dengan name="tahun_model" di blade
    DB::table('kendaraan')->where('no_rangka', $id)->update([
        'merk'        => $request->merk,
        'tipe'        => $request->tipe,
        'model'       => $request->model,
        'tahun_model' => $request->tahun_model, // SEBELUMNYA: $request->tahun
        'warna'       => $request->warna,
        'no_mesin'    => $request->no_mesin,
    ]);
    
    return redirect('/kendaraan')->with('success', 'Data Kendaraan berhasil diupdate!');
}

    public function destroy($id) {
        DB::table('kendaraan')->where('no_rangka', $id)->delete();
        return redirect('/kendaraan')->with('success', 'Data Kendaraan berhasil dihapus!');
    }
}