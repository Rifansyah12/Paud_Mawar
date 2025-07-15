<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pendaftarans', function (Blueprint $table) {
            $table->id();
            // Data Calon Siswa
            $table->timestamp('tanggal_daftar')->useCurrent();
            $table->string('nama_lengkap', 255);
            $table->enum('jenis_kelamin', ['Laki-laki', 'Perempuan']);
            $table->string('nisn', 20)->nullable();
            $table->string('nik', 16);
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->string('agama', 50)->nullable();
            $table->string('berkebutuhan_khusus')->nullable();

            // Alamat
            $table->string('dusun')->nullable();
            $table->string('desa')->nullable();
            $table->string('kode_pos')->nullable();
            $table->string('kecamatan')->nullable();
            $table->string('kab_kota')->nullable();
            $table->string('provinsi')->nullable();

            // Transportasi & Jenis Tinggal
            $table->string('alat_transportasi');
            $table->string('jenis_tinggal');
            $table->string('no_telp_rumah')->nullable();
            $table->string('no_hp')->nullable();
            $table->string('email')->nullable();

            // Data Periodik
            $table->float('tinggi_badan')->nullable();
            $table->float('berat_badan')->nullable();
            $table->float('jarak_ke_sekolah')->nullable();
            $table->integer('waktu_tempuh_ke_sekolah')->nullable(); // dalam menit
            $table->integer('jumlah_saudara')->nullable();

            // Data Ayah
            $table->string('nik_ayah', 16);
            $table->string('nama_ayah', 255);
            $table->year('tahun_lahir_ayah');
            $table->string('berkebutuhan_khusus_ayah')->nullable();
            $table->string('pekerjaan_ayah');
            $table->string('pendidikan_ayah');
            $table->string('penghasilan_ayah');

            // Data Ibu
            $table->string('nik_ibu', 16);
            $table->string('nama_ibu', 255);
            $table->year('tahun_lahir_ibu');
            $table->string('berkebutuhan_khusus_ibu')->nullable();
            $table->string('pekerjaan_ibu');
            $table->string('pendidikan_ibu');
            $table->string('penghasilan_ibu');

            // Upload gambar dokumen
            $table->string('foto_ktp')->nullable();
            $table->string('foto_kk')->nullable();
            $table->string('foto_akte')->nullable();
            
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pendaftarans');
    }
};
