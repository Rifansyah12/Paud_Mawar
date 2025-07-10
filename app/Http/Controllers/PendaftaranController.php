<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Pendaftaran;

class PendaftaranController extends Controller
{
    public function index()
    {
        $pendaftaran = Pendaftaran::all();
        return view('pendaftaran.index', compact('pendaftaran'));
    }

    public function create()
    {
        return view('pendaftaran.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nik' => 'required|digits:16',
            'nama' => 'required|string|max:255',
            'umur' => 'required|numeric|min:1',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
            'jumlah_saudara' => 'required|integer|min:0',
            'anak_ke' => 'required|integer|min:1',
            'negara' => 'required|string|max:100',
            'agama' => 'required|string|max:50',
            'tinggal_bersama' => 'required|string|max:100',
            'alamat' => 'required|string|max:500',
            'tinggi_badan' => 'required|numeric|min:30',
            'berat_badan' => 'required|numeric|min:5',
            'jaraktempuh' => 'required|numeric|min:0',
            'nama_ayah' => 'required|string|max:255',
            'nama_ibu' => 'required|string|max:255',
        ]);

        $pendaftaran = Pendaftaran::create($validated);

        return redirect()->route('pendaftaran.berhasil', ['id' => $pendaftaran->id]);
    }
    public function berhasil($id)
    {
        return view('pendaftaran.berhasil', compact('id'));
    }

    public function unduhFormulir($id)
    {
        $data = Pendaftaran::findOrFail($id);
        $pdf = Pdf::loadView('pendaftaran.formulir_pdf', compact('data'));
        return $pdf->download('formulir-pendaftaran-'.$data->nama.'.pdf');
    }
}
