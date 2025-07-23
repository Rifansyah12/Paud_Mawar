<?php

// app/Http/Controllers/DashboardController.php
namespace App\Http\Controllers;

use App\Models\Kesiswaan;
use App\Models\Galeri;

class DashboardController extends Controller
{
    public function index()
    {
        $jumlahPrestasi = Kesiswaan::count();
        $jumlahFoto = Galeri::where('tipe', 'foto')->count();
        $jumlahVideo = Galeri::where('tipe', 'video')->count();

         return view('admin.dashboard.index', compact('jumlahPrestasi', 'jumlahFoto', 'jumlahVideo'));
    }
}
