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
        Schema::create('mahasiswa', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nama_mahasiswa');
            $table->string('email');
            $table->integer('nomor_induk_mahasiswa');
            $table->string('jurusan');
            $table->string('no_hp');
            $table->string('address');
            $table->string('about');
            $table->unsignedBigInteger('mitra_id')->nullable(); // Kolom untuk kunci asing

            // Menambahkan kunci asing ke tabel 'mitra'
            $table->foreign('mitra_id')->references('id')->on('mitra')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
