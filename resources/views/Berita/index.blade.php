@extends('layouts.app')

@section('title', 'Berita')

@section('content')
    <section class="hero-wrap hero-wrap-2" style="background-image: url('images/bg_2.jpg');">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
            <h1 class="mb-2 bread">Berita</h1>
            <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>Berita <i class="ion-ios-arrow-forward"></i></span></p>
          </div>
        </div>
      </div>
    </section>
		
		<section class="ftco-section bg-light">
			<div class="container">
				<div class="row">
					@foreach($beritas as $berita)
						<div class="col-md-6 mb-4">
							<a href="{{ route('berita.show', $berita->id) }}" style="text-decoration: none; color: inherit;">
								<div class="card berita-card h-100 shadow-sm border-0 ftco-animate"
									style="border-radius: 12px; overflow: hidden; cursor: pointer;">
									
									<div class="card-img-top"
										style="background-image: url('{{ asset('storage/' . $berita->foto) }}'); background-size: cover; background-position: center; height: 220px;">
									</div>
									
									<div class="card-body bg-white">
										<h5 class="card-title mb-2">{{ $berita->judul }}</h5>
										<p class="text-muted mb-1" style="font-size: 0.9rem;">
											<i class="fa fa-calendar mr-2"></i> {{ $berita->created_at->format('d M Y') }}
										</p>
										<p class="card-text" style="font-size: 0.95rem;">
											{{ Str::limit($berita->isi, 150, '...') }}
										</p>
									</div>
								</div>
							</a>
						</div>
					@endforeach
				</div>
			</div>
		</section>


@endsection
