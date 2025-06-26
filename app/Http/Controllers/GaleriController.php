<?php
// app/Http/Controllers/GaleriController.php
namespace App\Http\Controllers;

use App\Models\Galeri;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GaleriController extends Controller
{
    public function foto()
    {
        $galeri = Galeri::paginate(3);
        return view('galeri.foto.index', compact('galeri'));
    }

    public function video()
    {
        $galeri = Galeri::where('tipe', 'video')->get();
        return view('galeri.video.index', compact('galeri'));
    }

    public function Adminfoto()
    {
        $galeri = Galeri::where('tipe', 'foto')->get();
        return view('admin.galeri.foto.index', compact('galeri'));
    }

    public function Adminvideo()
    {
        $galeri = Galeri::where('tipe', 'video')->get();
        return view('admin.galeri.video.index', compact('galeri'));
    }

    public function createFoto()
    {
        return view('admin.galeri.foto.create');
    }

    public function storeFoto(Request $request)
    {
    $request->validate([
        'file' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        'deskripsi' => 'required|string|max:255',
    ]);

    $path = $request->file('file')->store('galeri', 'public');

    Galeri::create([
        'file' => $path,
        'deskripsi' => $request->deskripsi,
        'tipe' => 'foto',
    ]);

    return redirect()->route('admin.galeri.foto')->with('success', 'Gambar berhasil ditambahkan.');
    }

    public function editFoto($id)
    {
        $galeri = Galeri::findOrFail($id);
        return view('admin.galeri.foto.edit', compact('galeri'));
    }

    public function updateFoto(Request $request, $id)
    {
    $galeri = Galeri::findOrFail($id);

    $request->validate([
        'deskripsi' => 'required|string|max:255',
        'file' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    if ($request->hasFile('file')) {
        Storage::disk('public')->delete($galeri->file);
        $galeri->file = $request->file('file')->store('galeri', 'public');
    }

    $galeri->deskripsi = $request->deskripsi;
    $galeri->save();

    return redirect()->route('galeri.foto')->with('success', 'Gambar berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $galeri = Galeri::findOrFail($id);
        Storage::disk('public')->delete($galeri->file);
        $galeri->delete();

        return redirect()->route('galeri.foto')->with('success', 'Gambar berhasil dihapus.');
    }
}
