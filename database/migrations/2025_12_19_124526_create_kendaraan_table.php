<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('kendaraan', function (Blueprint $table) {
            // Sesuai SQL: no_rangka varchar(50) Primary Key
            $table->string('no_rangka', 50)->primary();
            $table->string('merk', 50)->nullable();
            $table->string('tipe', 50)->nullable();
            $table->string('model', 50)->nullable();
            $table->string('tahun_model', 10)->nullable();
            $table->string('warna', 30)->nullable();
            $table->string('no_mesin', 50)->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('kendaraan');
    }
};