<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Fasilitas;


class FasilitasController extends Controller
{
public function show()
{
    $fasilitas = Fasilitas::all(); // ambil semua fasilitas
    return view('fasilitas', compact('fasilitas')); // kirim dengan nama $fasilitas
}
}
