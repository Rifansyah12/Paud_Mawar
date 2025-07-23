@extends('layouts.app')

@section('title', 'Fasilitas')

@section('content')
<section class="hero-wrap hero-wrap-2" style="background-image: url('images/kegiatan/bg-fasilitas.jpeg');">
  <div class="overlay"></div>
  <div class="container">
    <div class="row no-gutters slider-text align-items-center justify-content-center">
      <div class="col-md-9 ftco-animate text-center">
        <h1 class="mb-2 bread">Fasilitas</h1>
        <p class="breadcrumbs">
          <span class="mr-2"><a href="{{ url('/') }}">Beranda <i class="ion-ios-arrow-forward"></i></a></span>
          <span>Fasilitias<i class="ion-ios-arrow-forward"></i></span>
        </p>
      </div>
    </div>
  </div>
</section>
<!-- Content -->
	<section class="ftco-section">
    <div class="container">
        <div class="row">
            @foreach($fasilitas as $item)
            <div class="col-md-6 col-lg-3 ftco-animate">
                <div class="pricing-entry bg-light pb-4 text-center">
                    <div>
                        <h3 class="mb-3">{{ $item->nama }}</h3>
                        {{-- Jika ingin harga atau info tambahan bisa ditambahkan di sini --}}
                    </div>
                    <div class="img" style="background-image: url('{{ asset('storage/' . $item->gambar) }}');"></div>
                    <div class="px-4">
                        <p>{{ $item->deskripsi }}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

@endsection
