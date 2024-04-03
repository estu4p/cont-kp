<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('presensi', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('nama_lengkap')->nullable();
            $table->date('hari')->nullable();
            $table->time('jam_masuk')->nullable();
            $table->time('jam_pulang')->nullable();
            $table->time('jam_mulai_istirahat')->nullable();
            $table->time('jam_selesai_istirahat')->nullable();
            $table->time('total_jam_kerja')->nullable();
            $table->text('log_aktivitas')->nullable();
            $table->boolean('aksi')->default(false);
            $table->enum('status_kehadiran', ['Hadir', 'Izin', 'Sakit', 'Tidak Hadir', 'Ganti Jam']);
            $table->enum('status_ganti_jam', ['Ganti Jam', 'Tidak Ganti Jam']);
            $table->text('keterangan_status')->nullable();
            $table->string('kebaikan')->nullable();
            $table->string('barcode')->nullable()->unique();
            $table->time('hutang_presensi')->nullable();
            $table->bigInteger('target')->nullable();
            $table->timestamps();

            $table->foreign('nama_lengkap')
                ->references('id')->on('users')
                ->where('role', 3)
                ->onDelete('SET NULL');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('presensi');
    }
};
