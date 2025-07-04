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
    public function show($id)
    {
        $beritas = Berita::findOrFail($id);
        return view('berita.show', compact('beritas'));
    }
    
}

