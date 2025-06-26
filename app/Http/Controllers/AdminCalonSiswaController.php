<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pendaftaran;

class AdminCalonSiswaController extends Controller
{
    // Menampilkan daftar calon siswa
    public function index()
    {
        $pendaftaran = Pendaftaran::where('status', 'Menunggu')->get();
        return view('admin.calon_siswa.index', compact('pendaftaran'));
    }

    // Konfirmasi pendaftaran (misal ubah status)
    public function konfirmasi($id)
    {
        $siswa = Pendaftaran::findOrFail($id);
        $siswa->status = 'Dikonfirmasi'; // Pastikan kolom 'status' ada di tabel
        $siswa->save();

        return redirect()->route('admin.calon_siswa.index')->with('success', 'Pendaftaran berhasil dikonfirmasi!');
    }

    // Menghapus data calon siswa
    public function destroy($id)
    {
        $siswa = Pendaftaran::findOrFail($id);
        $siswa->delete();

        return redirect()->route('admin.calon_siswa.index')->with('success', 'Data calon siswa berhasil dihapus.');
    }

    // Tambahkan di AdminCalonSiswaController.php
    public function siswaTerkonfirmasi()
    {
        $pendaftaran = Pendaftaran::where('status', 'Dikonfirmasi')->get();
        return view('admin.kelola_siswa_baru.index', compact('pendaftaran'));
    }


}
