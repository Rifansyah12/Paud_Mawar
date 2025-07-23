@extends('layouts.app')

@section('title', 'Vidio')

@section('content')    
    
    <section class="hero-wrap hero-wrap-2" style="background-image: url('images/kegiatan/kegiatan5.jpeg');">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
            <h1 class="mb-2 bread">Galeri</h1>
            <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>Vidio <i class="ion-ios-arrow-forward"></i></span></p>
          </div>
        </div>
      </div>
    </section>
		
    
  <section class="ftco-section bg-light">
    <div class="container">
      <div class="row">
        @foreach($galeri as $item)
        <div class="col-md-6 col-lg-4 ftco-animate">
          <div class="blog-entry">
            <div class="block-20 d-flex align-items-end justify-content-center p-2 bg-white">
              <video width="100%" height="auto" controls>
                <source src="{{ asset('storage/' . $item->file) }}" type="video/mp4">
                Browser Anda tidak mendukung tag video.
              </video>
            </div>
            <div class="text bg-white p-4">
              <p>{{ $item->judul ?? '-' }}</p>
              <p>{{ $item->deskripsi }}</p>
            </div>
          </div>
        </div>
        @endforeach
      </div>

      <!-- PAGINATION (jika pakai paginate) -->
      <div class="row no-gutters my-5">
        <div class="col text-center">
          <div class="block-27">
            {{ $galeri->links('vendor.pagination.custom') }}
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection
