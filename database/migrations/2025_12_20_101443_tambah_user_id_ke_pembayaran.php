<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::table('pembayaran', function (Blueprint $table) {
            // Kita tambah kolom user_id setelah no_faktur
            $table->unsignedBigInteger('user_id')->nullable()->after('no_faktur');
        });
    }

    public function down(): void {
        Schema::table('pembayaran', function (Blueprint $table) {
            $table->dropColumn('user_id');
        });
    }
};