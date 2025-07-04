<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kesiswaan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminKesiswaanController extends Controller
{
    // Menampilkan semua data prestasi
    public function index()
    {
        $kesiswaans = Kesiswaan::all();
        return view('admin.kesiswaan.index', compact('kesiswaans'));
    }

    // Menampilkan form tambah
    public function create()
    {
        return view('admin.kesiswaan.create');
    }

    // Menyimpan data baru
    public function store(Request $request)
    {
        $request->validate([
            'nama_prestasi' => 'required|string|max:255',
            'tingkat'       => 'required|string|max:255',
            'tahun'         => 'required|digits:4|integer',
            'deskripsi'     => 'nullable|string',
            'gambar'        => 'nullable|image|max:2048',
        ]);

        $data = $request->all();

        if ($request->hasFile('gambar')) {
            $data['gambar'] = $request->file('gambar')->store('prestasi', 'public');
        }

        Kesiswaan::create($data);

        return redirect()->route('admin.kesiswaan.store')->with('success', 'Data prestasi berhasil ditambahkan.');
    }

    // Menampilkan form edit
    public function edit($id)
    {
        $kesiswaan = Kesiswaan::findOrFail($id);
        return view('admin.kesiswaan.edit', compact('kesiswaan'));
    }

    // Menyimpan update data
    public function update(Request $request, $id)
    {
        $kesiswaan = Kesiswaan::findOrFail($id);

        $request->validate([
            'nama_prestasi' => 'required|string|max:255',
            'tingkat'       => 'required|string|max:255',
            'tahun'         => 'required|digits:4|integer',
            'deskripsi'     => 'nullable|string',
            'gambar'        => 'nullable|image|max:2048',
        ]);

        $data = $request->all();

        if ($request->hasFile('gambar')) {
            // Hapus gambar lama jika ada
            if ($kesiswaan->gambar) {
                Storage::disk('public')->delete($kesiswaan->gambar);
            }

            $data['gambar'] = $request->file('gambar')->store('prestasi', 'public');
        }

        $kesiswaan->update($data);

        return redirect()->route('admin.kesiswaan.index')->with('success', 'Data prestasi berhasil diperbarui.');
    }

    // Menghapus data
    public function destroy($id)
    {
        $kesiswaan = Kesiswaan::findOrFail($id);

        if ($kesiswaan->gambar) {
            Storage::disk('public')->delete($kesiswaan->gambar);
        }

        $kesiswaan->delete();

        return redirect()->route('admin.kesiswaan.index')->with('success', 'Data prestasi berhasil dihapus.');
    }

    
}
