<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>@yield('title', 'Paud Mawar')</title>

    <!-- Bootstrap CSS (bisa kamu sesuaikan dengan versi yang kamu pakai) -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" />

    <!-- CSS tambahan -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}" />
    <link href="https://fonts.googleapis.com/css?family=Work+Sans:100,200,300,400,500,600,700,800,900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Fredericka+the+Great" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <!-- Local CSS (diubah ke format Blade asset) -->
    <link rel="stylesheet" href="{{ asset('css/open-iconic-bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/animate.css') }}">

    <link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/magnific-popup.css') }}">

    <link rel="stylesheet" href="{{ asset('css/aos.css') }}">

    <link rel="stylesheet" href="{{ asset('css/ionicons.min.css') }}">

    <link rel="stylesheet" href="{{ asset('css/flaticon.css') }}">
    <link rel="stylesheet" href="{{ asset('css/icomoon.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <!-- Jika ada section khusus css -->
    @stack('styles')
    <style>
    .berita-card {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .berita-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 16px 32px rgba(0, 0, 0, 0.15);
    }
    </style>

</head>
<body>
       <div class="py-2 bg-primary">
      <div class="container">
        <div
          class="row no-gutters d-flex align-items-start align-items-center px-3 px-md-0"
        >
          <div class="col-lg-12 d-block">
            <div class="row d-flex">
              <div class="col-md-5 pr-4 d-flex topper align-items-center">
                <div
                  class="icon bg-fifth mr-2 d-flex justify-content-center align-items-center"
                >
                  <span class="icon-map"></span>
                </div>
                <span class="text"
                  >198 West 21th Street, Suite 721 New York NY 10016</span
                >
              </div>
              <div class="col-md pr-4 d-flex topper align-items-center">
                <div
                  class="icon bg-secondary mr-2 d-flex justify-content-center align-items-center"
                >
                  <span class="icon-paper-plane"></span>
                </div>
                <span class="text">youremail@email.com</span>
              </div>
              <div class="col-md pr-4 d-flex topper align-items-center">
                <div
                  class="icon bg-tertiary mr-2 d-flex justify-content-center align-items-center"
                >
                  <span class="icon-phone2"></span>
                </div>
                <span class="text">+ 1235 2355 98</span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    {{-- Panggil navbar --}}
    @include('layouts.navbar')

    {{-- Main content yang berubah-ubah --}}
    <main>
        @yield('content')
    </main>

    {{-- Panggil footer --}}
    @include('layouts.footer')

    <!-- jQuery dan Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="js/jquery.min.js"></script>
    <script src="js/jquery-migrate-3.0.1.min.js"></script>
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.easing.1.3.js"></script>
    <script src="js/jquery.waypoints.min.js"></script>
    <script src="js/jquery.stellar.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/aos.js"></script>
    <script src="js/jquery.animateNumber.min.js"></script>
    <script src="js/scrollax.min.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
    <script src="js/google-map.js"></script>
    <script src="js/main.js"></script>
    <!-- JS tambahan -->
    <script src="{{ asset('js/app.js') }}"></script>

    {{-- Jika ada section khusus js --}}
    @stack('scripts')
</body>
</html>
