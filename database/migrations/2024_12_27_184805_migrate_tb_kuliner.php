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
        // Table kuliner
        Schema::create('kuliner', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('nama_kuliner');
            $table->integer('reting');
            $table->text('deskripsi')->nullable();
            $table->string('lokasi');
            $table->decimal('harga_rata', 10, 2)->default(0);
            $table->string('gambar')->nullable();
            $table->timestamps();
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
