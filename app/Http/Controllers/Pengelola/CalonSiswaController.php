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
    public function update($id)
    {
        $siswa = Pendaftaran::findOrFail($id);
        $siswa->status = 'Dikonfirmasi';
        $siswa->save();

        return redirect()->route('pengelola.data_siswa_baru')->with('success', 'Siswa berhasil dikonfirmasi.');
    }

}
