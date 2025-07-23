<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Formulir PPDB PAUD</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
            margin: 30px;
        }

        h3, h4 {
            text-align: center;
            margin: 5px 0;
        }

        .section-title {
            background-color: #f58025;
            color: white;
            font-weight: bold;
            padding: 6px 10px;
            margin-top: 25px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 5px;
        }

        td {
            padding: 6px 10px;
            vertical-align: top;
        }

        td:first-child {
            width: 40%;
        }

        .dotted {
            border-bottom: 1px dotted black;
        }

        .signature {
            margin-top: 50px;
            display: flex;
            justify-content: space-between;
        }

        .signature-box {
            width: 45%;
            text-align: center;
        }

        .line {
            margin-top: 60px;
            border-top: 1px solid #000;
            width: 80%;
            margin-left: auto;
            margin-right: auto;
        }
    </style>
</head>
<body>

    <table width="100%" style="border-collapse: collapse;">
        <tr>
            <td style="width: 20%; text-align: left;">
                <img src="{{ public_path('images/Logo.jpeg') }}" alt="Logo" style="height: 60px;">
            </td>
            <td style="width: 80%; text-align: center;">
                <h4 style="margin: 2px;">FORMULIR PENERIMAAN PESERTA DIDIK BARU (PPDB)</h4>
                <h4 style="margin: 2px;">TAHUN AJARAN 2025/2026</h4>
                <h4 style="margin: 2px;">PAUD / KELOMPOK BERMAIN</h4>
            </td>
        </tr>
    </table>

    <div class="section-title">DATA PESERTA DIDIK</div>
    <table>
        <tr><td><strong>Tanggal Daftar</strong></td><td>: {{ \Carbon\Carbon::parse($data->tanggal_daftar)->format('d-m-Y') }}</td></tr>
        <tr><td><strong>Nama Lengkap</strong></td><td>: {{ $data->nama_lengkap }}</td></tr>
        <tr><td><strong>Jenis Kelamin</strong></td><td>: {{ $data->jenis_kelamin }}</td></tr>
        <tr><td><strong>NISN</strong></td><td>: {{ $data->nisn }}</td></tr>
        <tr><td><strong>NIK</strong></td><td>: {{ $data->nik }}</td></tr>
        <tr><td><strong>Tempat Lahir</strong></td><td>: {{ $data->tempat_lahir }}</td></tr>
        <tr><td><strong>Tanggal Lahir</strong></td><td>: {{ \Carbon\Carbon::parse($data->tanggal_lahir)->format('d-m-Y') }}</td></tr>
        <tr><td><strong>Agama</strong></td><td>: {{ $data->agama }}</td></tr>
        <tr><td><strong>Berkebutuhan Khusus</strong></td><td>: {{ $data->berkebutuhan_khusus ?? '-' }}</td></tr>
        <tr><td><strong>Alamat</strong></td><td>:
            Dusun {{ $data->dusun ?? '-' }}, Desa {{ $data->desa ?? '-' }}, Kecamatan {{ $data->kecamatan ?? '-' }},
            {{ $data->kab_kota ?? '-' }}, Provinsi {{ $data->provinsi ?? '-' }}. Kode Pos: {{ $data->kode_pos ?? '-' }}
        </td></tr>
        <tr><td><strong>Jenis Tinggal</strong></td><td>: {{ $data->jenis_tinggal }}</td></tr>
        <tr><td><strong>Alat Transportasi</strong></td><td>: {{ $data->alat_transportasi }}</td></tr>
        <tr><td><strong>No HP</strong></td><td>: {{ $data->no_hp ?? '-' }}</td></tr>
        <tr><td><strong>Email</strong></td><td>: {{ $data->email ?? '-' }}</td></tr>
        <tr><td><strong>Tinggi Badan</strong></td><td>: {{ $data->tinggi_badan }} cm</td></tr>
        <tr><td><strong>Berat Badan</strong></td><td>: {{ $data->berat_badan }} kg</td></tr>
        <tr><td><strong>Jarak ke Sekolah</strong></td><td>: {{ $data->jarak_ke_sekolah }} km</td></tr>
        <tr><td><strong>Waktu Tempuh ke Sekolah</strong></td><td>: {{ $data->waktu_tempuh_ke_sekolah }} menit</td></tr>
        <tr><td><strong>Jumlah Saudara</strong></td><td>: {{ $data->jumlah_saudara }}</td></tr>
    </table>

    <div class="section-title">DATA AYAH</div>
    <table>
        <tr><td><strong>NIK Ayah</strong></td><td>: {{ $data->nik_ayah }}</td></tr>
        <tr><td><strong>Nama Ayah</strong></td><td>: {{ $data->nama_ayah }}</td></tr>
        <tr><td><strong>Tahun Lahir</strong></td><td>: {{ $data->tahun_lahir_ayah }}</td></tr>
        <tr><td><strong>Pendidikan</strong></td><td>: {{ $data->pendidikan_ayah }}</td></tr>
        <tr><td><strong>Pekerjaan</strong></td><td>: {{ $data->pekerjaan_ayah }}</td></tr>
        <tr><td><strong>Penghasilan</strong></td><td>: {{ $data->penghasilan_ayah }}</td></tr>
        <tr><td><strong>Berkebutuhan Khusus</strong></td><td>: {{ $data->berkebutuhan_khusus_ayah ?? '-' }}</td></tr>
    </table>

    <!-- BAGIAN DATA IBU -->
    <div style="page-break-inside: avoid;">
        <div class="section-title">DATA IBU</div>
        <table>
            <tr><td><strong>NIK Ibu</strong></td><td>: {{ $data->nik_ibu }}</td></tr>
            <tr><td><strong>Nama Ibu</strong></td><td>: {{ $data->nama_ibu }}</td></tr>
            <tr><td><strong>Tahun Lahir</strong></td><td>: {{ $data->tahun_lahir_ibu }}</td></tr>
            <tr><td><strong>Pendidikan</strong></td><td>: {{ $data->pendidikan_ibu }}</td></tr>
            <tr><td><strong>Pekerjaan</strong></td><td>: {{ $data->pekerjaan_ibu }}</td></tr>
            <tr><td><strong>Penghasilan</strong></td><td>: {{ $data->penghasilan_ibu }}</td></tr>
            <tr><td><strong>Berkebutuhan Khusus</strong></td><td>: {{ $data->berkebutuhan_khusus_ibu ?? '-' }}</td></tr>
        </table>
    </div>


    <table width="100%" style="margin-top: 50px;">
        <tr>
            <td style="text-align: center;">
                <p>Petugas Penerima</p>
                <br><br><br>
                <div style="border-bottom: 1px solid #000; width: 80%; margin: 0 auto;"></div>
            </td>
            <td style="text-align: center;">
                <p>Orang Tua/Wali</p>
                <br><br><br>
                <div style="border-bottom: 1px solid #000; width: 80%; margin: 0 auto;"></div>
            </td>
        </tr>
    </table>

</body>
</html>