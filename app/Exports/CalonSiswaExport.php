<?php
namespace App\Exports;

use App\Models\Pendaftaran;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class CalonSiswaExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        return Pendaftaran::where('status', 'Dikonfirmasi') // hanya siswa yang dikonfirmasi
        ->select(
            'tanggal_daftar',
            'nama_lengkap',
            'jenis_kelamin',
            'nisn',
            'nik',
            'tempat_lahir',
            'tanggal_lahir',
            'agama',
            'berkebutuhan_khusus',
            'dusun',
            'desa',
            'kode_pos',
            'kecamatan',
            'kab_kota',
            'provinsi',
            'alat_transportasi',
            'jenis_tinggal',
            'no_telp_rumah',
            'no_hp',
            'email',
            'tinggi_badan',
            'berat_badan',
            'jarak_ke_sekolah',
            'waktu_tempuh_ke_sekolah',
            'jumlah_saudara',
            'nik_ayah',
            'nama_ayah',
            'tahun_lahir_ayah',
            'berkebutuhan_khusus_ayah',
            'pekerjaan_ayah',
            'pendidikan_ayah',
            'penghasilan_ayah',
            'nik_ibu',
            'nama_ibu',
            'tahun_lahir_ibu',
            'berkebutuhan_khusus_ibu',
            'pekerjaan_ibu',
            'pendidikan_ibu',
            'penghasilan_ibu',
            'foto_ktp',
            'foto_kk',
            'foto_akte'
        )->get()->map(function ($item) {
            $item->foto_ktp = $item->foto_ktp ? asset('storage/' . $item->foto_ktp) : '-';
            $item->foto_kk = $item->foto_kk ? asset('storage/' . $item->foto_kk) : '-';
            $item->foto_akte = $item->foto_akte ? asset('storage/' . $item->foto_akte) : '-';
            return $item;
        });
    }

    public function headings(): array
    {
        return [
            'Tanggal Daftar',
            'Nama Lengkap',
            'Jenis Kelamin',
            'NISN',
            'NIK',
            'Tempat Lahir',
            'Tanggal Lahir',
            'Agama',
            'Berkebutuhan Khusus',
            'Dusun',
            'Desa',
            'Kode Pos',
            'Kecamatan',
            'Kab/Kota',
            'Provinsi',
            'Alat Transportasi',
            'Jenis Tinggal',
            'No Telp Rumah',
            'No HP',
            'Email',
            'Tinggi Badan',
            'Berat Badan',
            'Jarak ke Sekolah',
            'Waktu Tempuh ke Sekolah',
            'Jumlah Saudara',
            'NIK Ayah',
            'Nama Ayah',
            'Tahun Lahir Ayah',
            'Berkebutuhan Khusus Ayah',
            'Pekerjaan Ayah',
            'Pendidikan Ayah',
            'Penghasilan Ayah',
            'NIK Ibu',
            'Nama Ibu',
            'Tahun Lahir Ibu',
            'Berkebutuhan Khusus Ibu',
            'Pekerjaan Ibu',
            'Pendidikan Ibu',
            'Penghasilan Ibu',
            'Foto KTP',
            'Foto KK',
            'Foto Akte'
        ];
    }
}
