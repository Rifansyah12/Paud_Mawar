@extends('admin.layouts.app')

@section('title', 'Galeri Video')

@section('content')
<div class="container mt-4">
    <h1 class="mb-4">Galeri Video</h1>

    <a href="{{ route('admin.galeri.video.create') }}" class="btn btn-primary mb-3">Tambah Video</a>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="table-responsive">
        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th>No</th>
                    <th>Judul</th>
                    <th>Deskripsi</th>
                    <th>Video</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($galeri as $index => $video)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $video->judul }}</td>
                        <td>{{ $video->deskripsi }}</td>
                        <td>
                            <video width="200" controls>
                                <source src="{{ asset('storage/' . $video->file) }}" type="video/mp4">
                                Browser Anda tidak mendukung tag video.
                            </video>
                        </td>
                        <td>
                            <a href="{{ route('admin.galeri.video.edit', $video->id) }}" class="btn btn-sm btn-warning">Edit</a>
                            <form action="{{ route('admin.galeri.video.destroy', $video->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus video ini?')">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center">Belum ada video.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
