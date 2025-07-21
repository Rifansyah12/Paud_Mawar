<?php

namespace App\Http\Controllers\Pengelola;

use App\Http\Controllers\Controller;
use App\Models\Kelas;
use App\Models\Pendaftaran;
use Illuminate\Http\Request;

class DataSiswaBaruController extends Controller
{
    public function index()
    {
        $siswaBaru = Pendaftaran::where('status', 'Dikonfirmasi')->get();
        $kelas = Kelas::all(); //
        return view('pengelola.data_siswa_baru.index', compact('siswaBaru','kelas'));
    }

    public function updateKelas(Request $request, $id)
    {
        $request->validate([
            'kelas_id' => 'required|exists:kelas,id',
        ]);

        $siswa = Pendaftaran::findOrFail($id);
        $siswa->kelas_id = $request->kelas_id;
        $siswa->save();

        return redirect()->back()->with('success', 'Siswa berhasil dimasukkan ke kelas.');
    }

    public function destroy($id)
    {
        $siswa = Pendaftaran::findOrFail($id);
        $siswa->delete();

        return redirect()->back()->with('success', 'Data siswa berhasil dihapus.');
    }

    public function update(Request $request, $id)
    {
        $siswa = Pendaftaran::findOrFail($id);
        $siswa->update($request->all());

        return redirect()->back()->with('success', 'Data siswa berhasil diperbarui.');
    }

    public function edit($id)
    {
        $siswa = Pendaftaran::findOrFail($id);
        $kelas = Kelas::all(); // jika kamu ingin juga mengubah kelas

        return view('pengelola.data_siswa_baru.edit', compact('siswa', 'kelas'));
    }


}
