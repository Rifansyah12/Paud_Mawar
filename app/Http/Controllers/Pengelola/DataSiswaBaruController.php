<?php

namespace App\Http\Controllers\Pengelola;

use App\Http\Controllers\Controller;
use App\Models\Pendaftaran;

class DataSiswaBaruController extends Controller
{
    public function index()
    {
        $siswaBaru = Pendaftaran::where('status', 'Dikonfirmasi')->get();
        return view('pengelola.data_siswa_baru.index', compact('siswaBaru'));
    }
}
