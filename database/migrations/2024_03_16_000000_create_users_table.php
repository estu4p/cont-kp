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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('nama_lengkap');
            $table->integer('nomor_induk')->nullable();
            $table->string('sekolah')->nullable();
            $table->string('jurusan')->nullable();
            $table->string('email')->unique();
            $table->string('username')->unique()->nullable();
            $table->string('no_hp');
            $table->string('barcode')->nullable()->unique();
            $table->string('password');
            $table->string('alamat')->nullable();
            $table->enum('kota', ['Kota Surabaya', 'kota Semarang'])->nullable();
            $table->date('tgl_lahir')->nullable();
            $table->string('about')->nullable();
            $table->string('os')->nullable();
            $table->enum('status_akun', ['aktif', 'alumni'])->nullable();
            $table->string('browser')->nullable();
            $table->date('tgl_masuk')->nullable();
            $table->date('tgl_keluar')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->unsignedBigInteger('mitra_id')->nullable();
            $table->unsignedBigInteger('role_id')->nullable();
            $table->unsignedBigInteger('divisi_id')->nullable();
            $table->unsignedBigInteger('shift_id')->nullable();
            $table->unsignedBigInteger('project_id')->nullable();
            $table->unsignedBigInteger('paket_id')->nullable();
            $table->rememberToken();
            $table->timestamps();

            $table->foreign('role_id')->references('id')->on('role')->onDelete('SET NULL');
            $table->foreign('mitra_id')->references('id')->on('mitra')->onDelete('SET NULL');
            $table->foreign('divisi_id')->references('id')->on('divisi')->onDelete('SET NULL');
            $table->foreign('shift_id')->references('id')->on('shift')->onDelete('SET NULL');
            $table->foreign('project_id')->references('id')->on('project')->onDelete('SET NULL');
            $table->foreign('paket_id')->references('id')->on('paket')->onDelete('SET NULL');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
