<?php

namespace App\Http\Controllers\Pengelola;

use Illuminate\Http\Request;
use App\Models\kelas;
use App\Http\Controllers\Controller;
use App\Models\Pendaftaran;
use Barryvdh\DomPDF\Facade\Pdf;

class DataKelasController extends Controller
{
    // Tampilkan semua data kelas
    public function index(Request $request)
    {
        $query = Kelas::withCount('siswa');

        if ($request->filled('search')) {
            $query->where(function($q) use ($request) {
                $q->where('nama_kelas', 'like', '%' . $request->search . '%')
                ->orWhere('wali_kelas', 'like', '%' . $request->search . '%');
            });
        }

        $kelas = $query->get();
        $siswaBaru = Pendaftaran::where('status', 'diterima')->get();

        return view('pengelola.data_kelas.index', compact('kelas'));
    }


    // Tampilkan form tambah data kelas
    public function create()
    {
        return view('kelas.create');
    }

    // Simpan data kelas baru
    public function store(Request $request)
    {
        $request->validate([
            'nama_kelas' => 'required|string|max:255',
            'wali_kelas' => 'required|string|max:255',
            'tahun_ajaran' => 'required|string|max:50',
        ]);

        Kelas::create($request->only('nama_kelas', 'wali_kelas', 'tahun_ajaran'));

        return redirect()->back()->with('success', 'Kelas berhasil ditambahkan.');
    }


    // Tampilkan form edit kelas
    public function edit($id)
    {
        $kelas = Kelas::findOrFail($id);
        return view('kelas.edit', compact('kelas'));
    }

    // Update data kelas
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_kelas' => 'required|string|max:255',
            'tahun_ajaran' => 'required|string|max:255',
            'wali_kelas' => 'required|string|max:255',
        ]);

        $kelas = Kelas::findOrFail($id);
        $kelas->update($request->all());

        return redirect()->route('kelas.index')->with('success', 'Data kelas berhasil diperbarui.');
    }

    // Hapus data kelas
    public function destroy($id)
    {
        $kelas = Kelas::findOrFail($id);
        $kelas->delete();

        return redirect()->route('kelas.index')->with('success', 'Data kelas berhasil dihapus.');
    }

    

    public function exportSiswa($id)
    {
        $kelas = Kelas::with('siswa')->findOrFail($id);
        $pdf = Pdf::loadView('exports.siswa_per_kelas', compact('kelas'));
        return $pdf->download('data_siswa_kelas_' . $kelas->nama_kelas . '.pdf');
    }



}