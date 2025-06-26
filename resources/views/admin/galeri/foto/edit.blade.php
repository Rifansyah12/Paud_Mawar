@extends('admin.layouts.app')

@section('content')
<div class="container">
    <h2>Edit Gambar</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('galeri.update', $galeri->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="file">Gambar</label><br>
            <img src="{{ asset('storage/' . $galeri->file) }}" width="150" alt="Preview"><br><br>
            <input type="file" name="file" id="file" class="form-control">
            <small class="form-text text-muted">Kosongkan jika tidak ingin mengganti gambar.</small>
        </div>

        <div class="form-group">
            <label for="deskripsi">Deskripsi</label>
            <input type="text" name="deskripsi" id="deskripsi" class="form-control" value="{{ $galeri->deskripsi }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Perbarui</button>
        <a href="{{ route('galeri.foto') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
