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
        //
        Schema::create('sopir', function (Blueprint $table) {
            $table->uuid('id')->primary(); // Menggunakan UUID sebagai primary key
            $table->string('nama', 100); // Nama sopir
            $table->string('alamat')->nullable(); // Alamat sopir
            $table->string('no_telepon', 15)->unique(); // Nomor telepon sopir
            $table->string('sim')->nullable(); // Nomor SIM sopir
            $table->enum('status', ['Tersedia', 'Tidak Tersedia'])->default('Tersedia'); // Status sopir
            $table->integer('reting');
            $table->timestamps(); // Kolom created_at dan updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
     public function down(): void
     {
         //
         Schema::dropIfExists('sopir');
     }


};
