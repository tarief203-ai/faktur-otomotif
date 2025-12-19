<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kendaraan extends Model
{
    use HasFactory;
    protected $table = 'kendaraan';
    protected $primaryKey = 'no_rangka';
    public $incrementing = false;
    protected $keyType = 'string';
    protected $guarded = [];
}