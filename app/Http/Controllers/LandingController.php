<?php

namespace App\Http\Controllers;

use App\Models\Gurutendik;

class LandingController extends Controller
{
    public function index()
    {
        $guru = Gurutendik::all();
       return view('halamanutama', compact('guru'));
    }
}

