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
        Schema::create('mobil', function (Blueprint $table){
            $table->uuid('id')->primary();
            $table->string('merek');
            $table->integer('kapasitas');
            $table->string('plat');
            $table->enum('status', ['Tersedia', 'Tidak Tersedia'])->default('Tidak Tersedia');
            $table->decimal('price_per_day', 10, 2);
            $table->string('gambar_direc')->nullable();
            $table->string('model');
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
