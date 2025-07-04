@extends('layouts.app')

@section('title', 'Kesiswaan')

@section('content')
    <section class="hero-wrap hero-wrap-2" style="background-image: url('images/bg_2.jpg');">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
            <h1 class="mb-2 bread">Prestasi</h1>
            <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>Prestasi <i class="ion-ios-arrow-forward"></i></span></p>
          </div>
        </div>
      </div>
    </section>
		
	<section class="ftco-section">
		<div class="container">

			{{-- Judul --}}
			<style>
				.section-title {
					font-size: 2.5rem;
					font-weight: 700;
					text-align: center;
					color: #00bcd4;
					position: relative;
					margin-bottom: 40px;
					text-transform: uppercase;
					letter-spacing: 2px;
					animation: fadeInDown 1s ease-out;
				}

				.section-title::after {
					content: '';
					width: 80px;
					height: 4px;
					background: #00bcd4;
					display: block;
					margin: 10px auto 0;
					border-radius: 2px;
				}

				@keyframes fadeInDown {
					from {
						opacity: 0;
						transform: translateY(-20px);
					}
					to {
						opacity: 1;
						transform: translateY(0);
					}
				}

				.pricing-entry .img {
					width: 100%;
					height: 180px;
					background-size: cover;
					background-position: center;
					border-radius: 8px;
					margin-bottom: 15px;
				}
			</style>

			<h2 class="section-title">Prestasi</h2>
<!-- Css  -->
 <style>
    .section-title {
        font-family: 'Comic Sans MS', cursive, sans-serif;
        font-size: 2.5rem;
        font-weight: bold;
        text-align: center;
        color: #ff6f91;
        margin-bottom: 40px;
        text-transform: uppercase;
        animation: fadeInDown 1s ease-out;
    }

    .section-title::after {
        content: '';
        width: 80px;
        height: 5px;
        background: #ffb347;
        display: block;
        margin: 10px auto 0;
        border-radius: 2px;
    }

    .pricing-entry {
        background-color: #fff0f5;
        border-radius: 15px;
        border: 2px dashed #ffc0cb;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .pricing-entry:hover {
        transform: translateY(-8px);
        box-shadow: 0 8px 16px rgba(255, 192, 203, 0.3);
    }

    .pricing-entry h3 {
        font-family: 'Baloo 2', cursive;
        color: #ff69b4;
        font-size: 1.5rem;
    }

    .pricing-entry p {
        font-family: 'Poppins', sans-serif;
        color: #555;
    }

    .pricing-entry .img {
        width: 100%;
        height: 180px;
        background-size: cover;
        background-position: center;
        border-radius: 12px;
        margin: 15px 0;
        border: 3px solid #ffe4e1;
    }

    .btn-primary {
        background-color: #ff6f91;
        border: none;
        font-family: 'Poppins', sans-serif;
        font-weight: 600;
        transition: background-color 0.3s ease;
    }

    .btn-primary:hover {
        background-color: #ff8aa1;
    }

    .text-muted {
        color: #c0c0c0;
    }

    @keyframes fadeInDown {
        from {
            opacity: 0;
            transform: translateY(-20px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
</style>

			<div class="row">
				@forelse($Kesiswaans as $item)
				<div class="col-md-6 col-lg-3 ftco-animate mb-4">
					<div class="pricing-entry bg-light pb-4 text-center shadow-sm h-100">
						<div>
							<h3 class="mb-2">{{ $item->nama_prestasi }}</h3>
							<p><strong>{{ $item->tingkat }}</strong> - {{ $item->tahun }}</p>
						</div>
						<div class="img" style="background-image: url('{{ asset('storage/' . $item->gambar) }}');"></div>
						<div class="px-4">
							<p>{{ \Illuminate\Support\Str::limit($item->deskripsi, 10, '...') }}</p>
						</div>
						<p class="button text-center mt-3">
							<a href="{{ route('kesiswaan.show', $item->id) }}" class="btn btn-primary px-4 py-2">Lihat Detail</a>
						</p>
					</div>
				</div>
				@empty
				<div class="col-12 text-center">
					<p class="text-muted">Belum ada data prestasi tersedia.</p>
				</div>
				@endforelse
			</div>
		</div>
	</section>
@endsection
