<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSesuaiSqlSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Data Pemilik
        DB::table('pemilik')->insert([
            ['id_pemilik' => 'P001', 'nama' => 'Andi Santoso', 'alamat' => 'Jl. Merdeka 10', 'kode_pos' => '40123'],
            ['id_pemilik' => 'P002', 'nama' => 'Sari Dewi', 'alamat' => 'Jl. Sudirman 45', 'kode_pos' => '40234'],
            ['id_pemilik' => 'P003', 'nama' => 'Budi Hartono', 'alamat' => 'Jl. Diponegoro 78', 'kode_pos' => '40345'],
        ]);

        // 2. Data Kendaraan
        DB::table('kendaraan')->insert([
            ['no_rangka' => 'NR001', 'merk' => 'Toyota', 'tipe' => 'Avanza', 'model' => 'Veloz', 'tahun_model' => '2020', 'warna' => 'Hitam', 'no_mesin' => 'MESIN12345'],
            ['no_rangka' => 'NR002', 'merk' => 'Honda', 'tipe' => 'Civic', 'model' => 'Type R', 'tahun_model' => '2019', 'warna' => 'Merah', 'no_mesin' => 'MESIN67890'],
            ['no_rangka' => 'NR003', 'merk' => 'Suzuki', 'tipe' => 'Ertiga', 'model' => 'GX', 'tahun_model' => '2021', 'warna' => 'Putih', 'no_mesin' => 'MESIN54321'],
        ]);

        // 3. Data Pembayaran (Faktur)
        DB::table('pembayaran')->insert([
            [
                'no_faktur' => 'F001', 'no_pupd' => 'PUPD001', 'tgl_pupd' => '2025-05-01', 
                'harga' => '250000000', 'terbilang' => 'Dua Ratus Lima Puluh Juta Rupiah', 
                'tgl_pembayaran' => '2025-05-10', 'jumlah_unit' => '1', 
                'id_pemilik' => 'P001', 'no_rangka' => 'NR001'
            ],
            [
                'no_faktur' => 'F002', 'no_pupd' => 'PUPD002', 'tgl_pupd' => '2025-05-03', 
                'harga' => '350000000', 'terbilang' => 'Tiga Ratus Lima Puluh Juta Rupiah', 
                'tgl_pembayaran' => '2025-05-12', 'jumlah_unit' => '1', 
                'id_pemilik' => 'P002', 'no_rangka' => 'NR002'
            ],
        ]);
    }
}