<?php

namespace App\Http\Controllers\Pengelola;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pendaftaran;

class CalonSiswaController extends Controller
{
    public function index()
    {
        $calonSiswa = Pendaftaran::where('status', 'Menunggu')->get();
        return view('pengelola.calon_siswa.index', compact('calonSiswa'));
    }
}
