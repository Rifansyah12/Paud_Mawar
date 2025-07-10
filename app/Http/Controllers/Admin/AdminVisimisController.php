<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\VisiMisi;
use Illuminate\Http\Request;

class AdminVisimisController extends Controller
{
    public function index()
    {
        $data = VisiMisi::all();
        return view('admin.visimisi.index', compact('data'));
    }

    public function create()
    {
        return view('admin.visimisi.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'visi' => 'required',
            'misi' => 'required',
        ]);

        VisiMisi::create($request->all());
        return redirect()->route('admin.visimisi.index')->with('success', 'Data berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $data = VisiMisi::findOrFail($id);
        return view('admin.visimisi.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'visi' => 'required',
            'misi' => 'required',
        ]);

        VisiMisi::findOrFail($id)->update($request->all());
        return redirect()->route('admin.visimisi.index')->with('success', 'Data berhasil diubah.');
    }

    public function destroy($id)
    {
        VisiMisi::destroy($id);
        return redirect()->route('admin.visimisi.index')->with('success', 'Data berhasil dihapus.');
    }
}
