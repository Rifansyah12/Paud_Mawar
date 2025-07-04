@extends('layouts.app')

@section('title', 'Berita')

@section('content')
        <section class="hero-wrap hero-wrap-2" style="background-image: url('{{ asset('images/bg_2.jpg') }}');">
        <div class="overlay"></div>
        <div class="container">
            <div class="row no-gutters slider-text align-items-center justify-content-center">
            <div class="col-md-9 ftco-animate text-center">
                <h1 class="mb-2 bread">Berita</h1>
                <p class="breadcrumbs"><span class="mr-2"><a href="/">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>Berita <i class="ion-ios-arrow-forward"></i></span></p>
            </div>
            </div>
        </div>
        </section>
    <section class="ftco-section bg-light">
        <div class="container">
                         @if($beritas->foto)
             <img src="{{ asset('storage/' . $beritas->foto) }}" alt="{{ $beritas->judul }}" style="max-width: 100%;">
             @endif
            <h1 style="text-align: center;">{{ $beritas->judul }}</h1>
            <p>{{ $beritas->isi }}</p>
             <a href="{{ url('/berita') }}" class="btn btn-secondary mt-3">Kembali</a>
            </div>
        </div>
	</section>
@endsection
