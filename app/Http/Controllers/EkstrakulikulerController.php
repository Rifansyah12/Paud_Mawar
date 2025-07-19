<?php

namespace App\Http\Controllers;

use App\Models\Ekstrakulikuler;
use Illuminate\Http\Request;

class EkstrakulikulerController extends Controller
{
       public function show()
    {
        $ekstrakulikuler = Ekstrakulikuler::all();
        return view('ekstrakulikuler', compact('ekstrakulikuler'));
    }
}
