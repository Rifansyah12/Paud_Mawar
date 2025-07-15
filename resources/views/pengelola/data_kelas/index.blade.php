@extends('pengelola.layouts.app')

@section('content')
    <h3>Data Kelas</h3>

    <div class="table-responsive mt-4">
        <table class="table table-bordered table-hover table-striped align-middle">
            <thead class="table-info text-center">
                <tr>
                    <th>No</th>
                    <th>Nama Kelas</th>
                    <th>Wali Kelas</th>
                    <th>Jumlah Siswa</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($dataKelas as $index => $kelas)
                    <tr>
                        <td class="text-center">{{ $index + 1 }}</td>
                        <td>{{ $kelas->nama }}</td>
                        <td>{{ $kelas->wali_kelas }}</td>
                        <td class="text-center">{{ $kelas->jumlah_siswa }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center text-muted">Belum ada data kelas.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
