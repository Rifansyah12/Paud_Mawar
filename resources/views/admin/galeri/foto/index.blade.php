@extends('admin.layouts.app')

@section('content')
<div class="container-fluid">
    <h2 class="mb-4">Kelola Gambar</h2>

    <a href="{{ route('galeri.create') }}" class="btn btn-primary mb-3">Tambah Gambar</a>

    <div class="card shadow-sm">
        <div class="card-body">
            <div class="table-responsive">
                <table id="galeriTable" class="table table-bordered table-hover w-100">
                    <thead class="thead-dark">
                        <tr>
                            <th style="width: 5%;">No</th>
                            <th style="width: 20%;">Gambar</th>
                            <th style="width: 50%;">judul</th>
                            <th style="width: 25%;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($galeri as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>
                                    <img src="{{ asset('storage/' . $item->file) }}" alt="Gambar" class="img-thumbnail" style="max-width: 100px;">
                                </td>
                                <td>{{ $item->deskripsi }}</td>
                                <td>
                                    <a href="{{ route('galeri.edit', $item->id) }}" class="btn btn-sm btn-warning mb-1">Edit</a>
                                    <form action="{{ route('galeri.destroy', $item->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button onclick="return confirm('Yakin ingin menghapus?')" class="btn btn-sm btn-danger">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center">Belum ada gambar.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
<!-- DataTables CSS & JS -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap4.min.css">
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap4.min.js"></script>

<style>
    /* Tambahan untuk scrollbar */
    div.dataTables_wrapper div.dataTables_scrollBody {
        max-height: 300px !important;
    }

    /* Tambahan untuk tampilan rapih */
    table.dataTable td img {
        display: block;
        margin: 0 auto;
    }
</style>

<script>
    $(document).ready(function () {
        $('#galeriTable').DataTable({
            scrollY: '300px',
            scrollX: true,
            scrollCollapse: true,
            paging: true,
            autoWidth: false,
            lengthMenu: [[5, 10, 20, 50, 100], [5, 10, 20, 50, 100]],
            pageLength: 5,
            columnDefs: [
                { width: '5%', targets: 0 },
                { width: '20%', targets: 1 },
                { width: '50%', targets: 2 },
                { width: '25%', targets: 3 },
            ]
        });
    });
</script>

@endsection
