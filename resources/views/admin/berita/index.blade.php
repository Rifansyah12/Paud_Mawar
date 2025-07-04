@extends('admin.layouts.app')

@section('content')
<div class="container-fluid">
    <h2 class="mb-4">Kelola Berita</h2>

    <!-- Tombol buka modal tambah -->
    <button class="btn btn-primary mb-3" data-toggle="modal" data-target="#tambahModal">Tambah Berita</button>

    <!-- Modal Tambah -->
    <div class="modal fade" id="tambahModal" tabindex="-1" role="dialog" aria-labelledby="tambahModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
        <form action="{{ route('admin.berita.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Tambah Berita</h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
              </div>
              <div class="modal-body">
                  <div class="form-group">
                      <label>Judul</label>
                      <input type="text" name="judul" class="form-control" required>
                  </div>
                  <div class="form-group">
                      <label>Tanggal</label>
                      <input type="date" name="tanggal" class="form-control" required>
                  </div>
                  <div class="form-group">
                      <label>Isi</label>
                      <textarea name="isi" class="form-control" rows="4" required></textarea>
                  </div>
                  <div class="form-group">
                      <label>Foto</label>
                      <input type="file" name="foto" class="form-control-file">
                  </div>
              </div>
              <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Simpan</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
              </div>
            </div>
        </form>
      </div>
    </div>

    <!-- Table -->
    <div class="card shadow-sm">
        <div class="card-body">
            <div class="table-responsive">
                <table id="beritaTable" class="table table-bordered table-hover w-100">
                    <thead class="thead-dark">
                        <tr>
                            <th>No</th>
                            <th>Foto</th>
                            <th>Judul</th>
                            <th>Tanggal</th>
                            <th>Isi</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($beritas as $i => $berita)
                        <tr>
                            <td>{{ $i + 1 }}</td>
                            <td>
                                @if($berita->foto)
                                    <img src="{{ asset('storage/' . $berita->foto) }}" class="img-thumbnail" width="100">
                                @else
                                    <img src="https://via.placeholder.com/100" class="img-thumbnail">
                                @endif
                            </td>
                            <td>{{ $berita->judul }}</td>
                            <td>{{ $berita->tanggal }}</td>
                            <td>{{ Str::limit($berita->isi, 100) }}</td>
                            <td>
                                <!-- Tombol Edit -->
                                <button class="btn btn-warning btn-sm mb-1" data-toggle="modal" data-target="#editModal{{ $berita->id }}">Edit</button>

                                <!-- Modal Edit -->
                                <div class="modal fade" id="editModal{{ $berita->id }}" tabindex="-1" role="dialog">
                                    <div class="modal-dialog modal-lg" role="document">
                                        <form action="{{ route('admin.berita.update', $berita->id) }}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            @method('PUT')
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Edit Berita</h5>
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="form-group">
                                                        <label>Judul</label>
                                                        <input type="text" name="judul" class="form-control" value="{{ $berita->judul }}" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Tanggal</label>
                                                        <input type="date" name="tanggal" class="form-control" value="{{ $berita->tanggal }}" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Isi</label>
                                                        <textarea name="isi" class="form-control" rows="4" required>{{ $berita->isi }}</textarea>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Foto Baru (Opsional)</label>
                                                        <input type="file" name="foto" class="form-control-file">
                                                    </div>
                                                    @if($berita->foto)
                                                        <p>Foto saat ini: <img src="{{ asset('storage/' . $berita->foto) }}" width="100"></p>
                                                    @endif
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>

                                <!-- Tombol Hapus -->
                                <form action="{{ route('admin.berita.destroy', $berita->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Yakin ingin menghapus?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm">Hapus</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<!-- DataTables -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap4.min.css">
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap4.min.js"></script>

<script>
    $(document).ready(function () {
        $('#beritaTable').DataTable({
            scrollX: true,
            pageLength: 5
        });
    });
</script>
@endsection
