<h3>Daftar Siswa - {{ $kelas->nama_kelas }}</h3>
<table width="100%" border="1" cellspacing="0" cellpadding="5">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Lengkap</th>
            <th>Jenis Kelamin</th>
            <th>Tanggal Lahir</th>
        </tr>
    </thead>
    <tbody>
        @foreach($kelas->siswa as $i => $s)
            <tr>
                <td>{{ $i + 1 }}</td>
                <td>{{ $s->nama_lengkap }}</td>
                <td>{{ $s->jenis_kelamin }}</td>
                <td>{{ \Carbon\Carbon::parse($s->tanggal_lahir)->format('d-m-Y') }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
