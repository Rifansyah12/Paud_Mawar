<?php

namespace App\Http\Controllers;
use App\Models\Gurutendik;
use Illuminate\Http\Request;

class GurutendikController extends Controller
{
    public function show()
    {
        // Ambil data pertama (misalnya hanya ada 1 visi misi)
        $data = Gurutendik::all();

        // Arahkan ke resources/views/visimisi.blade.php
        return view('guru-tendik', compact('data'));
    }
}
