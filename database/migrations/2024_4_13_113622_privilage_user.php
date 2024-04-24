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
        Schema::create('user_privilege', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('privilege_id');
      
            $table->timestamps();
    
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('privilege_id')->references('id')->on('privilage')->onDelete('cascade');
            
            // Unique constraint to ensure each combination of user_id and privilege_id is unique
            // $table->unique(['user_id', 'privilege_id']);
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
