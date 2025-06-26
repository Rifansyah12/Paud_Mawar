<?php
// app/Http/Controllers/GaleriController.php
namespace App\Http\Controllers;

use App\Models\Galeri;

class GaleriController extends Controller
{
    public function foto()
    {
        $galeri = Galeri::where('tipe', 'foto')->get();
        return view('galeri.foto.index', compact('galeri'));
    }

    public function video()
    {
        $galeri = Galeri::where('tipe', 'video')->get();
        return view('galeri.video.index', compact('galeri'));
    }
}
