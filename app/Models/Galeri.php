<?php
// app/Models/Galeri.php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Galeri extends Model
{
    protected $table = 'galeri';

    protected $fillable = [
        'tipe', 'file', 'deskripsi'
    ];
}
