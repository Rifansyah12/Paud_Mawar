<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\VisiMisi;

class VisimisiController extends Controller
{
    public function show()
    {
        // Ambil data pertama (misalnya hanya ada 1 visi misi)
        $data = VisiMisi::first();

        // Arahkan ke resources/views/visimisi.blade.php
        return view('visi-misi', compact('data'));
    }
}
