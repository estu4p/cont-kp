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
        Schema::create('sekolah', function (Blueprint $table) {
            $table->id();
            $table->string('nama_sekolah');
            $table->string('nama_lengkap')->nullable();
            $table->string('email')->unique();
            $table->string('no_hp')->nullable();
            $table->string('password')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sekolah');
    }
};
