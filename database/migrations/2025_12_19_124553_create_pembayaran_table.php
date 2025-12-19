<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('pembayaran', function (Blueprint $table) {
            // Sesuai SQL: no_faktur varchar(50) Primary Key
            $table->string('no_faktur', 50)->primary();
            $table->string('no_pupd', 50)->nullable();
            $table->date('tgl_pupd')->nullable();
            $table->string('harga', 50)->nullable();
            $table->string('terbilang', 50)->nullable();
            $table->date('tgl_pembayaran')->nullable();
            $table->string('jumlah_unit', 50)->nullable();
            
            // Foreign Keys untuk Relasi
            $table->string('id_pemilik', 50)->nullable();
            $table->string('no_rangka', 50)->nullable();

            // Mendefinisikan Relasi (Foreign Key Constraints)
            $table->foreign('id_pemilik')->references('id_pemilik')->on('pemilik')->onDelete('cascade');
            $table->foreign('no_rangka')->references('no_rangka')->on('kendaraan')->onDelete('cascade');
            
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('pembayaran');
    }
};