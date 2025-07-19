@extends('layouts.app')

@section('title', 'Guru & Tendik')

@section('content')
<section class="hero-wrap hero-wrap-2" style="background-image: url('images/bg_2.jpg');">
  <div class="overlay"></div>
  <div class="container">
    <div class="row no-gutters slider-text align-items-center justify-content-center">
      <div class="col-md-9 ftco-animate text-center">
        <h1 class="mb-2 bread">Guru & Tendik</h1>
        <p class="breadcrumbs">
          <span class="mr-2"><a href="{{ url('/') }}">Beranda <i class="ion-ios-arrow-forward"></i></a></span>
          <span>Guru & Tendik<i class="ion-ios-arrow-forward"></i></span>
        </p>
      </div>
    </div>
  </div>
</section>
<!-- Content -->
		<section class="ftco-section ftco-no-pb">
			<div class="container">
				<div class="row">
           			 @foreach($data as $item)
					<div class="col-md-6 col-lg-3 ftco-animate">
						<div class="staff">
							<div class="img-wrap d-flex align-items-stretch">
								<div class="img align-self-stretch" style="background-image: url('{{ asset('storage/' . $item->foto) }}');"></div>
							</div>
							<div class="text pt-3 text-center">
								<h3>{{ $item->nama }}</h3>
								<span class="position mb-2">{{ $item->jabatan }}</span>
								<div class="faded">
									<p>{{ $item->deskripsi }}</p>
									<ul class="ftco-social text-center">
										<li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
										<li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
										<li class="ftco-animate"><a href="#"><span class="icon-google-plus"></span></a></li>
										<li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
									</ul>
								</div>
							</div>
						</div>
					</div>
					@endforeach
				</div>
			</div>
		</section>
@endsection
