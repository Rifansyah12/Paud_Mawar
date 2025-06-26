{{-- resources/views/admin/calon_siswa/index.blade.php --}}
@extends('admin.layouts.app')
@section('title', 'Kelola Siswa Baru')
@section('content')
    <h2>Daftar Siswa yang Telah Dikonfirmasi</h2>
    <p>Berikut adalah siswa yang telah dikonfirmasi pendaftarannya:</p>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Tutup">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    <table class="table table-bordered">
        <thead class="thead-dark">
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Usia</th>
                <th>Jenis Kelamin</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($pendaftaran as $key => $siswa)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $siswa->nama }}</td>
                    <td>{{ $siswa->umur }}</td>
                    <td>{{ $siswa->jenis_kelamin }}</td>
                    <td>
                    <a href="#" class="btn btn-warning btn-sm">Edit</a>
                    <a href="#" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#detailModal{{ $siswa->id }}">Lihat</a>          
                    <form action="{{ route('admin.calon_siswa.destroy', $siswa->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Yakin ingin menghapus data ini?');">
                         @csrf
                         @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                    </form>
                    </td>
                            <div class="modal fade" id="detailModal{{ $siswa->id }}" tabindex="-1" role="dialog" aria-labelledby="modalLabel{{ $siswa->id }}" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalLabel{{ $siswa->id }}">Detail Calon Siswa</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Tutup">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p><strong>NIK:</strong> {{ $siswa->nik }}</p>
                <p><strong>Nama:</strong> {{ $siswa->nama }}</p>
                <p><strong>Umur:</strong> {{ $siswa->umur }}</p>
                <p><strong>Jenis Kelamin:</strong> {{ $siswa->jenis_kelamin }}</p>
                <p><strong>Jumlah Saudara:</strong> {{ $siswa->jumlah_saudara }}</p>
                <p><strong>Anak ke-:</strong> {{ $siswa->anak_ke }}</p>
                <p><strong>Negara:</strong> {{ $siswa->negara }}</p>
                <p><strong>Agama:</strong> {{ $siswa->agama }}</p>
                <p><strong>Tinggal Bersama:</strong> {{ $siswa->tinggal_bersama }}</p>
                <p><strong>Alamat:</strong> {{ $siswa->alamat ?? '-' }}</p>
                <p><strong>Tinggi Badan:</strong> {{ $siswa->tinggi_badan }} cm</p>
                <p><strong>Berat Badan:</strong> {{ $siswa->berat_badan }} kg</p>
                <p><strong>Jarak Tempuh ke Sekolah:</strong> {{ $siswa->jaraktempuh }} km</p>
                <p><strong>Nama Ayah:</strong> {{ $siswa->nama_ayah }}</p>
                <p><strong>Nama Ibu:</strong> {{ $siswa->nama_ibu }}</p>

                <p><strong>Status:</strong>
                    @if($siswa->status === 'Dikonfirmasi')
                        <span class="badge bg-success">{{ $siswa->status }}</span>
                    @elseif($siswa->status === 'Menunggu')
                        <span class="badge bg-warning text-dark">{{ $siswa->status }}</span>
                    @else
                        <span class="badge bg-secondary">{{ $siswa->status }}</span>
                    @endif
                </p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
            </div>
            </div>
        </div>
        </div>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="text-center">Belum ada siswa yang dikonfirmasi.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
    


@endsection
