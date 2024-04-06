<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('paket', function (Blueprint $table) {
            $table->id();
            $table->string('nama_paket');
            $table->date('tanggal');
            $table->enum('status', ['Aktif', 'Tidak Aktif']);
            $table->string('no_pesanan');
            $table->string('harga');
            $table->enum('paket',['Bronze', 'Silver', 'Gold', 'Platinum']);
            $table->enum('metode_bayar', ['BNI', 'Dana'])->default('BNI');
            $table->timestamps();
            // kota ambil dari users ya
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('paket');
    }
};
