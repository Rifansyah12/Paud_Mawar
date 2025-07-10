<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
    use App\Models\Fasilitas    ;


class FasilitasController extends Controller
{
public function show()
    {
        // Ambil data pertama (misalnya hanya ada 1 visi misi)
        $data = Fasilitas::first();

        // Arahkan ke resources/views/visimisi.blade.php
        return view('guru-tendik', compact('data'));
    }
}
