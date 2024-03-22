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
        Schema::create('subscription', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('nama_lengkap')->nullable();
            $table->unsignedBigInteger('paket_id')->nullable();

            $table->foreign('nama_lengkap')->references('id')->on('users')->onDelete('SET NULL');
            $table->foreign('paket_id')->references('id')->on('paket')->onDelete('SET NULL ');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subscription');
    }
};
