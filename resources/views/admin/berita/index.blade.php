@extends('admin.layouts.app')

@section('content')
<div class="container-fluid">
    <h2 class="mb-4">Kelola Berita</h2>

    <a href="#" class="btn btn-primary mb-3">Tambah Berita</a>

    <div class="card shadow-sm">
        <div class="card-body">
            <div class="table-responsive">
                <table id="beritaTable" class="table table-bordered table-hover w-100">
                    <thead class="thead-dark">
                        <tr>
                            <th style="width: 5%;">No</th>
                            <th style="width: 15%;">Foto</th>
                            <th style="width: 20%;">Judul</th>
                            <th style="width: 15%;">Tanggal</th>
                            <th style="width: 30%;">Isi Penulisan</th>
                            <th style="width: 15%;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Data dummy sementara -->
                        <tr>
                            <td>1</td>
                            <td>
                                <img src="https://via.placeholder.com/100" alt="Foto" class="img-thumbnail">
                            </td>
                            <td>Judul Berita Pertama</td>
                            <td>2025-06-25</td>
                            <td>Lorem ipsum dolor sit amet, consectetur adipiscing elit...</td>
                            <td>
                                <a href="#" class="btn btn-sm btn-warning mb-1">Edit</a>
                                <button onclick="return confirm('Yakin ingin menghapus?')" class="btn btn-sm btn-danger">Hapus</button>
                            </td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>
                                <img src="https://via.placeholder.com/100" alt="Foto" class="img-thumbnail">
                            </td>
                            <td>Judul Berita Kedua</td>
                            <td>2025-06-24</td>
                            <td>Berita ini berisi informasi terbaru mengenai kegiatan desa...</td>
                            <td>
                                <a href="#" class="btn btn-sm btn-warning mb-1">Edit</a>
                                <button onclick="return confirm('Yakin ingin menghapus?')" class="btn btn-sm btn-danger">Hapus</button>
                            </td>
                        </tr>
                        <!-- Tambah data dummy lainnya sesuai kebutuhan -->
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
    div.dataTables_wrapper div.dataTables_scrollBody {
        max-height: 300px !important;
    }

    table.dataTable td img {
        display: block;
        margin: 0 auto;
    }

    td {
        vertical-align: middle !important;
    }
</style>

<script>
    $(document).ready(function () {
        $('#beritaTable').DataTable({
            scrollY: '300px',
            scrollX: true,
            scrollCollapse: true,
            paging: true,
            autoWidth: false,
            lengthMenu: [[5, 10, 20, 50, 100], [5, 10, 20, 50, 100]],
            pageLength: 5,
            columnDefs: [
                { width: '5%', targets: 0 },
                { width: '15%', targets: 1 },
                { width: '20%', targets: 2 },
                { width: '15%', targets: 3 },
                { width: '30%', targets: 4 },
                { width: '15%', targets: 5 }
            ]
        });
    });
</script>
@endsection
