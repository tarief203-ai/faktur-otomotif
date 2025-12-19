<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pemilik extends Model
{
    use HasFactory;
    protected $table = 'pemilik';
    protected $primaryKey = 'id_pemilik'; // PK Custom
    public $incrementing = false;         // Matikan auto-increment
    protected $keyType = 'string';        // Tipe data PK adalah string
    protected $guarded = [];              // Izinkan semua kolom diisi
}