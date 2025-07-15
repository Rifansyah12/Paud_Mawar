<?php

namespace App\Http\Controllers\Pengelola;

use App\Http\Controllers\Controller;

class LaporanController extends Controller
{
    public function index()
    {
        return view('pengelola.laporan.index');
    }
}
