<?php

namespace App\Http\Controllers;

use App\Models\Ekstrakulikuler;
use Illuminate\Http\Request;

class EkstrakulikulerController extends Controller
{
    public function show()
    {
        // Ambil data pertama (misalnya hanya ada 1 visi misi)
        $data = Ekstrakulikuler::first();

        // Arahkan ke resources/views/visimisi.blade.php
        return view('ekstrakulikuler', compact('data'));
    }
}
