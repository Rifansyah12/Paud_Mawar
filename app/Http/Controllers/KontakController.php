<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KontakController extends Controller
{
    /**
     * Menampilkan halaman kontak.
     */
    public function show()
    {
        return view('kontak'); // pastikan file resources/views/kontak.blade.php sudah ada
    }
}
