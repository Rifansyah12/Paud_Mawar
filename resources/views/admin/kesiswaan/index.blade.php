@extends('admin.layouts.app')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4">Data Prestasi Siswa</h2>

    <!-- Tombol Tambah -->
    <button class="btn btn-primary mb-3" data-toggle="modal" data-target="#modalCreate">
        <i class="fas fa-plus"></i> Tambah Prestasi
    </button>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered table-striped">
        <thead class="thead-dark">
            <tr>
                <th>No</th>
                <th>Nama Prestasi</th>
                <th>Tingkat</th>
                <th>Tahun</th>
                <th>Deskripsi</th>
                <th>Gambar</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @php use Illuminate\Support\Str; @endphp
            @forelse($kesiswaans as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->nama_prestasi }}</td>
                <td>{{ $item->tingkat }}</td>
                <td>{{ $item->tahun }}</td>
                <td>{{ Str::limit($item->deskripsi, 10, '...') }}</td>
                <td>
                    @if($item->gambar)
                        <img src="{{ asset('storage/' . $item->gambar) }}" alt="gambar" width="80">
                    @else
                        <span class="text-muted">Tidak ada</span>
                    @endif
                </td>
                <td>
                    <!-- Tombol Edit -->
                    <button class="btn btn-sm btn-warning" data-toggle="modal" data-target="#modalEdit{{ $item->id }}">
                        <i class="fas fa-edit"></i> Edit
                    </button>

                    <!-- Form Hapus -->
                    <form action="{{ route('admin.kesiswaan.destroy', $item->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus?')">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger">
                            <i class="fas fa-trash-alt"></i> Hapus
                        </button>
                    </form>
                </td>
            </tr>

            <!-- Modal Edit -->
            <div class="modal fade" id="modalEdit{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="modalEditLabel{{ $item->id }}" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <form action="{{ route('admin.kesiswaan.update', $item->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Edit Prestasi</h5>
                                <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                            </div>
                            <div class="modal-body">
                                <div class="form-group">
                                    <label>Nama Prestasi</label>
                                    <input type="text" name="nama_prestasi" class="form-control" value="{{ $item->nama_prestasi }}" required>
                                </div>
                                <div class="form-group">
                                    <label>Tingkat</label>
                                    <input type="text" name="tingkat" class="form-control" value="{{ $item->tingkat }}" required>
                                </div>
                                <div class="form-group">
                                    <label>Tahun</label>
                                    <input type="number" name="tahun" class="form-control" value="{{ $item->tahun }}" required>
                                </div>
                                <div class="form-group">
                                    <label>Deskripsi</label>
                                    <textarea name="deskripsi" class="form-control" required>{{ $item->deskripsi }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label>Gambar (opsional)</label>
                                    <input type="file" name="gambar" class="form-control-file">
                                    @if($item->gambar)
                                        <img src="{{ asset('storage/' . $item->gambar) }}" class="mt-2" width="100">
                                    @endif
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            @empty
            <tr>
                <td colspan="7" class="text-center">Belum ada data prestasi</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>

<!-- Modal Tambah -->
<div class="modal fade" id="modalCreate" tabindex="-1" role="dialog" aria-labelledby="modalCreateLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form action="{{ route('admin.kesiswaan.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Prestasi</h5>
                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Nama Prestasi</label>
                        <input type="text" name="nama_prestasi" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Tingkat</label>
                        <input type="text" name="tingkat" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Tahun</label>
                        <input type="number" name="tahun" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Deskripsi</label>
                        <textarea name="deskripsi" class="form-control" required></textarea>
                    </div>
                    <div class="form-group">
                        <label>Gambar (opsional)</label>
                        <input type="file" name="gambar" class="form-control-file">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection
