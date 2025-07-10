<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Ekstrakulikuler;
use Illuminate\Http\Request;

class AdminEkstrakulikulerController extends Controller
{
    public function index()
    {
        $data = Ekstrakulikuler::all();
        return view('admin.ekstrakulikuler.index', compact('data'));
    }

    public function create()
    {
        return view('admin.ekstrakulikuler.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'deskripsi' => 'nullable',
            'gambar' => 'nullable|image|mimes:jpg,png,jpeg|max:2048'
        ]);

        $data = $request->all();
        if ($request->hasFile('gambar')) {
            $data['gambar'] = $request->file('gambar')->store('ekstrakulikuler', 'public');
        }

        Ekstrakulikuler::create($data);
        return redirect()->route('admin.ekstrakulikuler.index')->with('success', 'Data berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $data = Ekstrakulikuler::findOrFail($id);
        return view('admin.ekstrakulikuler.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required',
            'deskripsi' => 'nullable',
            'gambar' => 'nullable|image|mimes:jpg,png,jpeg|max:2048'
        ]);

        $data = $request->all();
        $item = Ekstrakulikuler::findOrFail($id);

        if ($request->hasFile('gambar')) {
            $data['gambar'] = $request->file('gambar')->store('ekstrakulikuler', 'public');
        }

        $item->update($data);
        return redirect()->route('admin.ekstrakulikuler.index')->with('success', 'Data berhasil diubah.');
    }

    public function destroy($id)
    {
        Ekstrakulikuler::destroy($id);
        return redirect()->route('admin.ekstrakulikuler.index')->with('success', 'Data berhasil dihapus.');
    }
}
