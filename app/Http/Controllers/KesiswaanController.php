<?php

namespace App\Http\Controllers;

use App\Models\Kesiswaan; // misal ada model Berita

class KesiswaanController extends Controller
{
    public function index()
    {
        $Kesiswaans = Kesiswaan::all(); // ambil semua berita
        return view('kesiswaan.index', compact('Kesiswaans'));
    }
        public function show($id)
    {
        $prestasi = Kesiswaan::findOrFail($id);
        return view('kesiswaan.show', compact('prestasi'));
    }
}

