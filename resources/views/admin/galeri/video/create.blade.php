@extends('admin.layouts.app')

@section('title', 'Tambah Video')

@section('content')
<div class="container mt-4">
    <h1 class="mb-4">Tambah Video</h1>

    <form action="{{ route('admin.galeri.video.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label for="judul" class="form-label">Judul Video</label>
            <input type="text" name="judul" id="judul" class="form-control" required value="{{ old('judul') }}">
        </div>

        <div class="mb-3">
            <label for="deskripsi" class="form-label">Deskripsi</label>
            <textarea name="deskripsi" id="deskripsi" class="form-control" rows="4" required>{{ old('deskripsi') }}</textarea>
        </div>

        <div class="mb-3">
            <label for="file" class="form-label">Unggah Video (MP4)</label>
            <input type="file" name="file" id="file" class="form-control" accept="video/mp4" required>
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('admin.galeri.video') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
