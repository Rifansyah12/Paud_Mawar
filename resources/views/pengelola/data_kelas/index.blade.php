@extends('pengelola.layouts.app')

@section('content')
<h3>Data Kelas</h3>

{{-- Tombol Tambah Kelas & Form Pencarian --}}
<div class="mb-3 d-flex justify-content-between align-items-center">
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalTambahKelas">
        Tambah Kelas
    </button>

    <form action="{{ route('kelas.index') }}" method="GET" class="d-flex" style="max-width: 300px;">
        <input type="text" name="search" class="form-control form-control-sm me-2" placeholder="Cari kelas..." value="{{ request('search') }}">
        <button type="submit" class="btn btn-outline-secondary btn-sm">Cari</button>
    </form>
</div>

{{-- Tabel Data Kelas --}}
<div class="table-responsive mt-4">
    <table class="table table-bordered table-hover table-striped align-middle">
        <thead class="table-info text-center">
            <tr>
                <th>No</th>
                <th>Nama Kelas</th>
                <th>Wali Kelas</th>
                <th>Tahun Ajaran</th>
                <th>Jumlah Siswa</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($kelas as $index => $k)
                <tr>
                    <td class="text-center">{{ $index + 1 }}</td>
                    <td>{{ $k->nama_kelas }}</td>
                    <td>{{ $k->wali_kelas }}</td>
                    <td class="text-center">{{ $k->tahun_ajaran }}</td>
                    <td class="text-center">{{ $k->siswa_count }}</td>
                    <td class="text-center">
                        <button class="btn btn-info btn-sm me-1" data-bs-toggle="modal" data-bs-target="#modalDetail{{ $k->id }}">Detail</button>
                        <button class="btn btn-warning btn-sm me-1" data-bs-toggle="modal" data-bs-target="#modalEdit{{ $k->id }}">Edit</button>
                        <form action="{{ route('kelas.destroy', $k->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus kelas ini?')">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm">Hapus</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="text-center text-muted">Belum ada data kelas.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

{{-- Modal Tambah Kelas --}}
<div class="modal fade" id="modalTambahKelas" tabindex="-1" aria-labelledby="modalTambahKelasLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form action="{{ route('kelas.store') }}" method="POST">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Kelas</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="mb-3">
                        <label class="form-label">Nama Kelas</label>
                        <input type="text" class="form-control" name="nama_kelas" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Wali Kelas</label>
                        <input type="text" class="form-control" name="wali_kelas" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Tahun Ajaran</label>
                        <input type="text" class="form-control" name="tahun_ajaran" placeholder="Contoh: 2024/2025" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </div>
        </form>
    </div>
</div>

{{-- Modal Edit & Detail Ditaruh di Luar Table --}}
@foreach ($kelas as $k)
    {{-- Modal Edit --}}
    <div class="modal fade" id="modalEdit{{ $k->id }}" tabindex="-1" aria-labelledby="modalEditLabel{{ $k->id }}" aria-hidden="true">
        <div class="modal-dialog">
            <form action="{{ route('kelas.update', $k->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Edit Kelas</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label">Nama Kelas</label>
                            <input type="text" class="form-control" name="nama_kelas" value="{{ $k->nama_kelas }}" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Wali Kelas</label>
                            <input type="text" class="form-control" name="wali_kelas" value="{{ $k->wali_kelas }}" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Tahun Ajaran</label>
                            <input type="text" class="form-control" name="tahun_ajaran" value="{{ $k->tahun_ajaran }}" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Perbarui</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    {{-- Modal Detail --}}
    <div class="modal fade" id="modalDetail{{ $k->id }}" tabindex="-1" aria-labelledby="modalDetailLabel{{ $k->id }}" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Detail Kelas: {{ $k->nama_kelas }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <p><strong>Nama Kelas:</strong> {{ $k->nama_kelas }}</p>
                    <p><strong>Wali Kelas:</strong> {{ $k->wali_kelas }}</p>
                    <p><strong>Tahun Ajaran:</strong> {{ $k->tahun_ajaran }}</p>
                    <p><strong>Jumlah Siswa:</strong> {{ $k->siswa_count }}</p>

                    <a href="{{ route('kelas.export.siswa', $k->id) }}" class="btn btn-sm btn-success mb-3" target="_blank">Unduh Data Siswa</a>

                    @if ($k->siswa->count())
                        <div class="table-responsive">
                            <table class="table table-sm table-bordered">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Lengkap</th>
                                        <th>Jenis Kelamin</th>
                                        <th>Tanggal Lahir</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($k->siswa as $i => $s)
                                        <tr>
                                            <td>{{ $i + 1 }}</td>
                                            <td>{{ $s->nama_lengkap }}</td>
                                            <td>{{ $s->jenis_kelamin }}</td>
                                            <td>{{ \Carbon\Carbon::parse($s->tanggal_lahir)->format('d-m-Y') }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <p class="text-muted">Belum ada siswa yang masuk ke kelas ini.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endforeach
@endsection