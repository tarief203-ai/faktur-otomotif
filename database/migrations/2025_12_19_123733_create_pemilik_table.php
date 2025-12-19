<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('pemilik', function (Blueprint $table) {
            // Sesuai SQL: id_pemilik varchar(50) Primary Key
            $table->string('id_pemilik', 50)->primary(); 
            $table->string('nama', 100)->nullable();
            $table->string('alamat', 50)->nullable();
            $table->string('kode_pos', 10)->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('pemilik');
    }
};