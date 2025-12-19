<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    use HasFactory;
    protected $table = 'pembayaran';
    protected $primaryKey = 'no_faktur';
    public $incrementing = false;
    protected $keyType = 'string';
    protected $guarded = [];

    // Relasi ke Pemilik (Satu pembayaran milik satu pemilik)
    public function pemilik() {
        return $this->belongsTo(Pemilik::class, 'id_pemilik', 'id_pemilik');
    }

    // Relasi ke Kendaraan
    public function kendaraan() {
        return $this->belongsTo(Kendaraan::class, 'no_rangka', 'no_rangka');
    }
}