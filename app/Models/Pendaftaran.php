<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pendaftaran extends Model
{
    use HasFactory;

    protected $fillable = [
        'nik', 'nama', 'umur', 'jenis_kelamin', 'jumlah_saudara',
        'anak_ke', 'negara', 'agama', 'tinggal_bersama',
        'alamat', 'tinggi_badan', 'berat_badan', 'jaraktempuh',
        'nama_ayah', 'nama_ibu',
    ];
}
