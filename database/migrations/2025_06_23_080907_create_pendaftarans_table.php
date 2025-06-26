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
        Schema::create('pendaftarans', function (Blueprint $table) {
            $table->id();
            $table->string('nik', 16);
            $table->string('nama', 255);
            $table->integer('umur');
            $table->enum('jenis_kelamin', ['Laki-laki', 'Perempuan']);
            $table->integer('jumlah_saudara');
            $table->integer('anak_ke');
            $table->string('negara', 100);
            $table->string('agama', 50);
            $table->string('tinggal_bersama', 100);
            $table->string('alamat', 500);
            $table->float('tinggi_badan');
            $table->float('berat_badan');
            $table->float('jaraktempuh');
            $table->string('nama_ayah', 255);
            $table->string('nama_ibu', 255);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pendaftarans');
    }
};
