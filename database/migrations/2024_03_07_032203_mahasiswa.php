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
        Schema::create("mahasiswa", function (Blueprint $table) {
            $table->bigIncrements("id");
            $table->string("nama_mahasiswa");
            $table->string("email");
            $table->integer("nomor_induk_mahasiswa");
            $table->string("jurusan");
            $table->string("no_hp");
            $table->string("address");
            $table->string("about");
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
