@extends('layouts.app')

@section('title', 'Visi dan Misi')

@section('content')
<section class="hero-wrap hero-wrap-2" style="background-image: url('images/bg_2.jpg');">
  <div class="overlay"></div>
  <div class="container">
    <div class="row no-gutters slider-text align-items-center justify-content-center">
      <div class="col-md-9 ftco-animate text-center">
        <h1 class="mb-2 bread">Visi & Misi</h1>
        <p class="breadcrumbs">
          <span class="mr-2"><a href="{{ url('/') }}">Beranda <i class="ion-ios-arrow-forward"></i></a></span>
          <span>Visi dan Misi <i class="ion-ios-arrow-forward"></i></span>
        </p>
      </div>
    </div>
  </div>
</section>

<section class="ftco-section bg-light">
  <div class="container">
    <div class="row justify-content-center mb-5">
      <div class="col-md-10 text-center ftco-animate">
         <div class="card shadow-lg border-0 rounded-lg">
          <div class="card-body px-4 py-5">
            <h2 class="mb-4">Visi Kami</h2>
            <p class="lead">Menjadi lembaga pendidikan unggulan yang mencetak generasi cerdas, berkarakter, dan berakhlak mulia melalui proses pembelajaran yang berkualitas dan inklusif.</p>
          </div>
         </div>
        </div>
    </div>

    <div class="row justify-content-center">
      <div class="col-md-10 ftco-animate">
        <div class="card shadow-lg border-0 rounded-lg">
          <div class="card-body px-4 py-5">
            <h3 class="mb-4 text-center">Misi Kami</h3>
            <ul class="list-unstyled pl-md-3">
              <li class="mb-3 d-flex">
                <span class="mr-3 text-primary"><i class="icon-check-circle"></i></span>
                <span>Menyelenggarakan pendidikan yang berbasis nilai keagamaan, kebangsaan, dan kecerdasan abad 21.</span>
              </li>
              <li class="mb-3 d-flex">
                <span class="mr-3 text-primary"><i class="icon-check-circle"></i></span>
                <span>Mengembangkan potensi peserta didik melalui kegiatan akademik dan non-akademik yang kreatif dan inovatif.</span>
              </li>
              <li class="mb-3 d-flex">
                <span class="mr-3 text-primary"><i class="icon-check-circle"></i></span>
                <span>Menciptakan lingkungan belajar yang aman, nyaman, dan menyenangkan bagi seluruh warga sekolah.</span>
              </li>
              <li class="mb-3 d-flex">
                <span class="mr-3 text-primary"><i class="icon-check-circle"></i></span>
                <span>Menjalin kemitraan dengan orang tua, masyarakat, dan lembaga lain untuk mendukung kemajuan pendidikan.</span>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection
