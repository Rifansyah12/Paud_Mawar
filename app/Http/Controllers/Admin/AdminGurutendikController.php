<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Gurutendik;
use Illuminate\Http\Request;

class AdminGurutendikController extends Controller
{
    public function index()
    {
        $data = Gurutendik::all();
        return view('admin.gurutendik.index', compact('data'));
    }

    public function create()
    {
        return view('admin.gurutendik.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'jabatan' => 'required',
            'deskripsi' => 'nullable',
            'foto' => 'nullable|image|mimes:jpg,png,jpeg|max:2048'
        ]);

        $data = $request->all();
        if ($request->hasFile('foto')) {
            $data['foto'] = $request->file('foto')->store('gurutendik', 'public');
        }

        Gurutendik::create($data);
        return redirect()->route('admin.gurutendik.index')->with('success', 'Data berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $data = Gurutendik::findOrFail($id);
        return view('admin.gurutendik.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required',
            'jabatan' => 'required',
            'deskripsi' => 'nullable',
            'foto' => 'nullable|image|mimes:jpg,png,jpeg|max:2048'
        ]);

        $data = $request->all();
        $item = Gurutendik::findOrFail($id);

        if ($request->hasFile('foto')) {
            $data['foto'] = $request->file('foto')->store('gurutendik', 'public');
        }

        $item->update($data);
        return redirect()->route('admin.gurutendik.index')->with('success', 'Data berhasil diubah.');
    }

    public function destroy($id)
    {
        Gurutendik::destroy($id);
        return redirect()->route('admin.gurutendik.index')->with('success', 'Data berhasil dihapus.');
    }
}
