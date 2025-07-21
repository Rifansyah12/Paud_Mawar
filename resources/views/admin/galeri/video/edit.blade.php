@extends('admin.layouts.app')

@section('title', 'Edit Video')

@section('content')
<div class="container mt-4">
    <h1 class="mb-4">Edit Video</h1>

    <form action="{{ route('admin.galeri.video.update', $galeri->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="judul" class="form-label">Judul Video</label>
            <input type="text" name="judul" id="judul" class="form-control" value="{{ old('judul', $galeri->judul) }}" required>
        </div>

        <div class="mb-3">
            <label for="deskripsi" class="form-label">Deskripsi</label>
            <textarea name="deskripsi" id="deskripsi" class="form-control" rows="4" required>{{ old('deskripsi', $galeri->deskripsi) }}</textarea>
        </div>

        <div class="mb-3">
            <label for="file" class="form-label">Ganti Video (jika perlu)</label>
            <input type="file" name="file" id="file" class="form-control" accept="video/mp4">
            @if($galeri->file)
                <p class="mt-2">Video saat ini:</p>
                <video width="300" controls>
                    <source src="{{ asset('storage/' . $galeri->file) }}" type="video/mp4">
                </video>
            @endif
        </div>

        <button type="submit" class="btn btn-success">Perbarui</button>
        <a href="{{ route('admin.galeri.video.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
