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
        Schema::create('penilaian', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('nama_lengkap');
            $table->unsignedBigInteger('sub_id');
            $table->integer('nilai');
            $table->text('kritik_saran');
            $table->timestamps();
            $table->foreign('nama_lengkap')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('sub_id')->references('id')->on('sub_kategori_penilaian');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penilaian');
    }
};
