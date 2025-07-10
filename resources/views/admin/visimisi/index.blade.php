@extends('admin.layouts.app')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4">Data Visi dan Misi</h2>

    <!-- Tombol Tambah -->
    <button class="btn btn-primary mb-3" data-toggle="modal" data-target="#modalCreate">
        <i class="fas fa-plus"></i> Tambah Visi Misi
    </button>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered table-striped">
        <thead class="thead-dark">
            <tr>
                <th>No</th>
                <th>Visi</th>
                <th>Misi</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($data as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->visi }}</td>
                <td>{{ $item->misi }}</td>
                <td>
                    <!-- Tombol Edit -->
                    <button class="btn btn-sm btn-warning" data-toggle="modal" data-target="#modalEdit{{ $item->id }}">
                        <i class="fas fa-edit"></i> Edit
                    </button>

                    <!-- Form Hapus -->
                    <form action="{{ route('admin.visimisi.destroy', $item->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus?')">
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
                    <form action="{{ route('admin.visimisi.update', $item->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Edit Visi Misi</h5>
                                <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                            </div>
                            <div class="modal-body">
                                <div class="form-group">
                                    <label>Visi</label>
                                    <textarea name="visi" class="form-control" required>{{ $item->visi }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label>Misi</label>
                                    <textarea name="misi" class="form-control" required>{{ $item->misi }}</textarea>
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
                <td colspan="4" class="text-center">Belum ada data visi & misi</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>

<!-- Modal Tambah -->
<div class="modal fade" id="modalCreate" tabindex="-1" role="dialog" aria-labelledby="modalCreateLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form action="{{ route('admin.visimisi.store') }}" method="POST">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Visi Misi</h5>
                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Visi</label>
                        <textarea name="visi" class="form-control" required></textarea>
                    </div>
                    <div class="form-group">
                        <label>Misi</label>
                        <textarea name="misi" class="form-control" required></textarea>
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
