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
        Schema::create('riwayat', function (Blueprint $table) {
            $table->id();
            $table->string('nama_paket')->nullable();
            $table->date('tanggal');
            $table->date('tanggal_berakhir');
            $table->enum('status', ['Aktif', 'Tidak Aktif']);
            $table->string('no_pesanan');
            $table->string('harga');
            $table->enum('paket', ['Bronze', 'Silver', 'Gold', 'Platinum']);
            $table->text('metode_bayar');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('riwayat');
    }
};
