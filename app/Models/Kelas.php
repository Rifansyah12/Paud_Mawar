<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    protected $table = "kelas";
    protected $fillable = ['nama_kelas','tahun_ajaran',"wali_kelas"];

public function siswa()
{
    return $this->hasMany(Pendaftaran::class, 'kelas_id'); // sesuaikan nama model dan kolom jika beda
}

}
