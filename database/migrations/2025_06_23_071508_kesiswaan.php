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
        Schema::create('kesiswaans', function (Blueprint $table) {
               $table->id();
                $table->string('nama_prestasi');
                $table->string('tingkat');
                $table->text('deskripsi')->nullable();
                $table->year('tahun');
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
