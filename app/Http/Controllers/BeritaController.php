<?php

namespace App\Http\Controllers;

use App\Models\Berita; // misal ada model Berita

class BeritaController extends Controller
{
    public function index()
    {
        $beritas = Berita::all(); // ambil semua berita
        return view('berita.index', compact('beritas'));
    }
}

