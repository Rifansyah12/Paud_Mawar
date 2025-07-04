@extends('layouts.app')

@section('title', 'Kesiswaan')

@section('content')
    <section class="hero-wrap hero-wrap-2" style="background-image: url('{{ asset('images/bg_2.jpg') }}');">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
            <h1 class="mb-2 bread">Kesiswaan</h1>
            <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>Kesiswaan <i class="ion-ios-arrow-forward"></i></span></p>
          </div>
        </div>
      </div>
    </section>
		
	<section class="ftco-section">
    <div class="container">
        <h2 class="text-center mb-4">{{ $prestasi->nama_prestasi }}</h2>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <img src="{{ asset('storage/' . $prestasi->gambar) }}" class="img-fluid mb-4 rounded" alt="Gambar Prestasi">
                <p><strong>Tingkat:</strong> {{ $prestasi->tingkat }}</p>
                <p><strong>Tahun:</strong> {{ $prestasi->tahun }}</p>
                <p><strong>Deskripsi:</strong> {{ $prestasi->deskripsi }}</p>
                <a href="{{ route('admin.kesiswaan.index') }}" class="btn btn-secondary mt-3">Kembali</a>
            </div>
        </div>
    </div>
</section>
@endsection
