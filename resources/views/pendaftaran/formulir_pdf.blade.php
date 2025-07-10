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
            <!-- Logo kiri -->
            <td style="width: 20%; text-align: left;">
                <img src="{{ public_path('images/Logo.jpeg') }}" alt="Logo" style="height: 60px;">
            </td>

            <!-- Judul tengah -->
            <td style="width: 80%; text-align: center;">
                <h4 style="margin: 2px;">FORMULIR PENERIMAAN PESERTA DIDIK BARU (PPDB)</h4>
                <h4 style="margin: 2px;">TAHUN AJARAN 2025/2026</h4>
                <h4 style="margin: 2px;">PAUD / KELOMPOK BERMAIN</h4>
            </td>
        </tr>
    </table>


    <div class="section-title">DATA PESERTA DIDIK</div>
    <table>
        <tr><td><strong>NIK</strong></td><td>: {{ $data->nik }}</td></tr>
        <tr><td><strong>Nama</strong></td><td>: {{ $data->nama }}</td></tr>
        <tr><td><strong>Umur</strong></td><td>: {{ $data->umur }} tahun</td></tr>
        <tr><td><strong>Jenis Kelamin</strong></td><td>: {{ $data->jenis_kelamin }}</td></tr>
        <tr><td><strong>Jumlah Saudara</strong></td><td>: {{ $data->jumlah_saudara }}</td></tr>
        <tr><td><strong>Anak ke</strong></td><td>: {{ $data->anak_ke }}</td></tr>
        <tr><td><strong>Negara</strong></td><td>: {{ $data->negara }}</td></tr>
        <tr><td><strong>Agama</strong></td><td>: {{ $data->agama }}</td></tr>
        <tr><td><strong>Tinggal Bersama</strong></td><td>: {{ $data->tinggal_bersama }}</td></tr>
        <tr><td><strong>Alamat</strong></td><td>: {{ $data->alamat }}</td></tr>
        <tr><td><strong>Tinggi Badan</strong></td><td>: {{ $data->tinggi_badan }} cm</td></tr>
        <tr><td><strong>Berat Badan</strong></td><td>: {{ $data->berat_badan }} kg</td></tr>
        <tr><td><strong>Jarak Tempuh</strong></td><td>: {{ $data->jaraktempuh }} km</td></tr>
    </table>

    <div class="section-title">DATA ORANG TUA</div>
    <table>
        <tr><td><strong>Nama Ayah</strong></td><td>: {{ $data->nama_ayah }}</td></tr>
        <tr><td><strong>Nama Ibu</strong></td><td>: {{ $data->nama_ibu }}</td></tr>
    </table>

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
