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
        Schema::create('presensi', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('nama_lengkap')->nullable();
            $table->dateTime('jam_masuk');
            $table->dateTime('jam_pulang');
            $table->dateTime('jam_mulai_istirahat');
            $table->dateTime('jam_selesai_istirahat');
            $table->time('total_jam_kerja')->nullable();
            $table->text('log_aktivitas')->nullable();
            $table->boolean('aksi')->default(false);
            $table->enum('status_kehadiran', ['Hadir', 'Izin', 'Sakit', 'Tidak Hadir']);
            $table->text('keterangan_status')->nullable();
            $table->string('kebaikan');
            $table->enum('status_absensi', ['Scan QR Code', 'Button']);
            $table->unsignedBigInteger('mitra_id')->nullable();
            $table->unsignedBigInteger('role_id')->nullable();
            $table->unsignedBigInteger('divisi_id')->nullable();
            $table->string('barcode')->nullable()->unique();
            $table->timestamps();

            $table->foreign('nama_lengkap')
                ->references('id')->on('users')
                ->where('role', 3)
                ->onDelete('SET NULL');
            $table->foreign('role_id')->references('id')->on('users')->where('role_id', 3)->onDelete('SET NULL');
            $table->foreign('mitra_id')->references('id')->on('mitra')->onDelete('SET NULL');
            $table->foreign('divisi_id')->references('id')->on('divisi')->onDelete('SET NULL');
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
