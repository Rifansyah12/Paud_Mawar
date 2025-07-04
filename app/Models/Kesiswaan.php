<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kesiswaan extends Model
{
    use HasFactory;

    // Nama tabel jika tidak mengikuti konvensi jamak Laravel (tidak wajib di sini karena "kesiswaans" sudah sesuai)
    protected $table = 'kesiswaans';

    // Kolom yang boleh diisi secara massal
    protected $fillable = [
        'nama_prestasi',
        'tingkat',
        'deskripsi',
        'tahun',
        'gambar',
    ];
}
