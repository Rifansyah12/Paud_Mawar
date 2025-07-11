<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Exports\CalonSiswaExport;
use Maatwebsite\Excel\Facades\Excel;
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
            // Data Calon Siswa
            'tanggal_daftar' => 'required|date',
            'nama_lengkap' => 'required|string|max:255',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
            'nisn' => 'required|digits:10',
            'nik' => 'required|digits:16',
            'tempat_lahir' => 'required|string|max:100',
            'tanggal_lahir' => 'required|date',
            'agama' => 'required|string|max:50',
            'berkebutuhan_khusus' => 'nullable|string|max:100',

            // Alamat
            'dusun' => 'nullable|string|max:100',
            'desa' => 'nullable|string|max:100',
            'kode_pos' => 'nullable|string|max:10',
            'kecamatan' => 'nullable|string|max:100',
            'kab_kota' => 'nullable|string|max:100',
            'provinsi' => 'nullable|string|max:100',

            // Transportasi & Jenis Tinggal
            'alat_transportasi' => 'required|string|max:100',
            'jenis_tinggal' => 'required|string|max:100',
            'no_telp_rumah' => 'nullable|string|max:15',
            'no_hp' => 'nullable|string|max:15',
            'email' => 'nullable|email|max:255',

            // Data Periodik
            'tinggi_badan' => 'required|numeric|min:30',
            'berat_badan' => 'required|numeric|min:5',
            'jarak_ke_sekolah' => 'required|numeric|min:0',
            'waktu_tempuh_ke_sekolah' => 'required|numeric|min:0',
            'jumlah_saudara' => 'required|integer|min:0',

            // Data Ayah
            'nik_ayah' => 'required|digits:16',
            'nama_ayah' => 'required|string|max:255',
            'tahun_lahir_ayah' => 'required|digits:4',
            'berkebutuhan_khusus_ayah' => 'nullable|string|max:100',
            'pekerjaan_ayah' => 'required|string|max:100',
            'pendidikan_ayah' => 'required|string|max:100',
            'penghasilan_ayah' => 'required|string|max:100',

            // Data Ibu
            'nik_ibu' => 'required|digits:16',
            'nama_ibu' => 'required|string|max:255',
            'tahun_lahir_ibu' => 'required|digits:4',
            'berkebutuhan_khusus_ibu' => 'nullable|string|max:100',
            'pekerjaan_ibu' => 'required|string|max:100',
            'pendidikan_ibu' => 'required|string|max:100',
            'penghasilan_ibu' => 'required|string|max:100',
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
        return $pdf->download('formulir-pendaftaran-' . $data->nama_lengkap . '.pdf');
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
            'tanggal_lahir' => 'required|date',
            // Tambah validasi lain jika perlu
        ]);

        $pendaftaran = Pendaftaran::findOrFail($id);
        $pendaftaran->update($validated);

        return redirect()->back()->with('success', 'Data berhasil diperbarui.');
    }

    public function export()
    {
        return Excel::download(new CalonSiswaExport, 'data_siswa.xlsx');
    }


}
