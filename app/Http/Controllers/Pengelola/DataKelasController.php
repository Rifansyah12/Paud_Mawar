<?php

namespace App\Http\Controllers\Pengelola;

use App\Http\Controllers\Controller;

class DataKelasController extends Controller
{
    public function index()
    {
        return view('pengelola.data_kelas.index');
    }
}
