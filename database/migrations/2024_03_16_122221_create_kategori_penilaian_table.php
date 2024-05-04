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
        Schema::create('kategori_penilaian', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('divisi_id');
            $table->string('nama_kategori');
            $table->timestamps();

            $table->foreign('divisi_id')->references('id')->on('divisi')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kateogri_penilaian');
    }
};
