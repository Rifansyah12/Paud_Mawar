<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pendaftaran extends Model
{
    use HasFactory;

    protected $fillable = [
        // Data Calon Siswa
        'tanggal_daftar',
        'nama_lengkap',
        'jenis_kelamin',
        'nisn',
        'nik',
        'tempat_lahir',
        'tanggal_lahir',
        'agama',
        'berkebutuhan_khusus',

        // Alamat
        'dusun',
        'desa',
        'kode_pos',
        'kecamatan',
        'kab_kota',
        'provinsi',

        // Transportasi & Jenis Tinggal
        'alat_transportasi',
        'jenis_tinggal',
        'no_telp_rumah',
        'no_hp',
        'email',

        // Data Periodik
        'tinggi_badan',
        'berat_badan',
        'jarak_ke_sekolah',
        'waktu_tempuh_ke_sekolah',
        'jumlah_saudara',

        // Data Ayah
        'nik_ayah',
        'nama_ayah',
        'tahun_lahir_ayah',
        'berkebutuhan_khusus_ayah',
        'pekerjaan_ayah',
        'pendidikan_ayah',
        'penghasilan_ayah',

        // Data Ibu
        'nik_ibu',
        'nama_ibu',
        'tahun_lahir_ibu',
        'berkebutuhan_khusus_ibu',
        'pekerjaan_ibu',
        'pendidikan_ibu',
        'penghasilan_ibu',
    ];
}
