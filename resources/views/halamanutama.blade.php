@extends('layouts.app')

@section('title', 'Beranda Paud Mawar')

@section('content')
    <section class="home-slider owl-carousel">
      <div class="slider-item" style="background-image: url(images/Background/bg-1.jpeg)">
        <div class="overlay"></div>
        <div class="container">
          <div
            class="row no-gutters slider-text align-items-center justify-content-center"
            data-scrollax-parent="true"
          >
            <div class="col-md-8 text-center ftco-animate">
              <h1 class="mb-4">
                Anak-Anak Adalah Yang Terbaik <span>Penjelajah Di Dunia</span>
              </h1>
              <p>
                <a href="#" class="btn btn-secondary px-4 py-3 mt-3"
                  >PMB 2025</a
                >
              </p>
            </div>
          </div>
        </div>
      </div>

      <div class="slider-item" style="background-image: url(images/Background/bg-2.jpeg)">
        <div class="overlay"></div>
        <div class="container">
          <div
            class="row no-gutters slider-text align-items-center justify-content-center"
            data-scrollax-parent="true"
          >
            <div class="col-md-8 text-center ftco-animate">
              <h1 class="mb-4">Perfect Learned<span> For Your Child</span></h1>
              <p>
                <a href="#" class="btn btn-secondary px-4 py-3 mt-3"
                  >PMB 2025</a
                >
              </p>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="ftco-services ftco-no-pb">
  <div class="container-wrap">
    <div class="row no-gutters">
        <div class="col-md-3 d-flex services align-self-stretch pb-4 px-4 ftco-animate bg-primary">
          <div class="media block-6 d-block text-center">
            <div class="icon d-flex justify-content-center align-items-center">
              <span class="flaticon-teacher"></span>
            </div>
            <div class="media-body p-2 mt-3">
              <h3 class="heading">Guru Berpengalaman</h3>
              <p>
                PAUD Mawar memiliki tenaga pengajar yang ramah, sabar, dan profesional dalam mendidik anak usia dini.
              </p>
            </div>
          </div>
        </div>

        <div class="col-md-3 d-flex services align-self-stretch pb-4 px-4 ftco-animate bg-tertiary">
          <div class="media block-6 d-block text-center">
            <div class="icon d-flex justify-content-center align-items-center">
              <span class="flaticon-reading"></span>
            </div>
            <div class="media-body p-2 mt-3">
              <h3 class="heading">Pembelajaran Khusus</h3>
              <p>
                Program belajar dirancang khusus untuk merangsang tumbuh kembang anak secara optimal dan menyenangkan.
              </p>
            </div>
          </div>
        </div>

        <div class="col-md-3 d-flex services align-self-stretch pb-4 px-4 ftco-animate bg-fifth">
          <div class="media block-6 d-block text-center">
            <div class="icon d-flex justify-content-center align-items-center">
              <span class="flaticon-books"></span>
            </div>
            <div class="media-body p-2 mt-3">
              <h3 class="heading">Buku & Perpustakaan</h3>
              <p>
                Fasilitas buku cerita dan bahan ajar anak yang menarik untuk menumbuhkan minat baca sejak dini.
              </p>
            </div>
          </div>
        </div>

        <div class="col-md-3 d-flex services align-self-stretch pb-4 px-4 ftco-animate bg-quarternary">
          <div class="media block-6 d-block text-center">
            <div class="icon d-flex justify-content-center align-items-center">
              <span class="flaticon-diploma"></span>
            </div>
            <div class="media-body p-2 mt-3">
              <h3 class="heading">Ijazah & Sertifikat</h3>
              <p>
                Setiap anak yang lulus akan mendapatkan ijazah dan sertifikat sebagai tanda kelulusan dari PAUD Mawar.
              </p>
            </div>
          </div>
        </div>

      </div>
    </div>
  </section>


   <section class="ftco-section ftco-no-pt ftc-no-pb">
    <div class="container">
      <div class="row">
        <div class="col-md-5 order-md-last wrap-about py-5 wrap-about bg-light">
          <div class="text px-4 ftco-animate">
            <h2 class="mb-4">Profil PAUD Mawar 13</h2>
            <p>
              PAUD Mawar 13 merupakan lembaga pendidikan anak usia dini yang
              berfokus pada pengembangan karakter, kreativitas, dan kecerdasan
              anak secara menyeluruh dalam lingkungan yang aman dan menyenangkan.
            </p>
            <p>
              Dengan tenaga pendidik yang kompeten dan fasilitas pendukung yang
              lengkap, PAUD Mawar berkomitmen untuk menjadi mitra terbaik orang
              tua dalam membentuk generasi cerdas dan berakhlak mulia.
            </p>
            <p>
              <a href="#" class="btn btn-secondary px-4 py-3">Selengkapnya</a>
            </p>
          </div>
        </div>

        <div class="col-md-7 wrap-about py-5 pr-md-4 ftco-animate">
          <h2 class="mb-4">Fasilitas</h2>
          <p>
            PAUD Mawar menyediakan berbagai fasilitas penunjang kegiatan belajar
            yang aman, nyaman, dan mendukung perkembangan holistik anak.
          </p>
          <div class="row mt-5">
            <div class="col-lg-6">
              <div class="services-2 d-flex">
                <div class="icon mt-2 mr-3 d-flex justify-content-center align-items-center">
                  <span class="flaticon-security"></span>
                </div>
                <div class="text">
                  <h3>Keamanan Terjamin</h3>
                  <p>Lingkungan belajar yang aman dan terawasi dengan baik.</p>
                </div>
              </div>
            </div>

            <div class="col-lg-6">
              <div class="services-2 d-flex">
                <div class="icon mt-2 mr-3 d-flex justify-content-center align-items-center">
                  <span class="flaticon-reading"></span>
                </div>
                <div class="text">
                  <h3>Kegiatan Rutin</h3>
                  <p>Kegiatan belajar rutin yang dirancang sesuai tumbuh kembang anak.</p>
                </div>
              </div>
            </div>

            <div class="col-lg-6">
              <div class="services-2 d-flex">
                <div class="icon mt-2 mr-3 d-flex justify-content-center align-items-center">
                  <span class="flaticon-diploma"></span>
                </div>
                <div class="text">
                  <h3>Pendidik Bersertifikat</h3>
                  <p>Tenaga pengajar profesional yang telah tersertifikasi.</p>
                </div>
              </div>
            </div>

            <div class="col-lg-6">
              <div class="services-2 d-flex">
                <div class="icon mt-2 mr-3 d-flex justify-content-center align-items-center">
                  <span class="flaticon-education"></span>
                </div>
                <div class="text">
                  <h3>Ruang Kelas Nyaman</h3>
                  <p>Ruang kelas bersih, aman, dan menyenangkan untuk belajar.</p>
                </div>
              </div>
            </div>

            <div class="col-lg-6">
              <div class="services-2 d-flex">
                <div class="icon mt-2 mr-3 d-flex justify-content-center align-items-center">
                  <span class="flaticon-jigsaw"></span>
                </div>
                <div class="text">
                  <h3>Pelajaran Kreatif</h3>
                  <p>Kegiatan bermain sambil belajar untuk merangsang imajinasi anak.</p>
                </div>
              </div>
            </div>

            <div class="col-lg-6">
              <div class="services-2 d-flex">
                <div class="icon mt-2 mr-3 d-flex justify-content-center align-items-center">
                  <span class="flaticon-kids"></span>
                </div>
                <div class="text">
                  <h3>Area Bermain Anak</h3>
                  <p>Fasilitas bermain luar ruangan untuk mendukung motorik kasar anak.</p>
                </div>
              </div>
            </div>

          </div>
        </div>
      </div>
    </div>
  </section>


    <section
      class="ftco-intro"
      style="background-image: url(images/Background/bg-3.jpeg)"
      data-stellar-background-ratio="0.5"
    >
      <div class="overlay"></div>
      <div class="container">
        <div class="row">
          <div class="col-md-9">
            <h2>Mengajarkan Anak Anda Beberapa Tata Krama Yang Baik</h2>
            <p class="mb-0">
              Sebuah sungai kecil bernama Duden mengalir di dekat tempat tinggal
              mereka dan menyediakan berbagai hal yang diperlukan. Itu adalah
              negeri yang indah, di mana kalimat-kalimat yang dipanggang akan
              langsung masuk ke mulut Anda.
            </p>
          </div>
          <div class="col-md-3 d-flex align-items-center">
            <p class="mb-0">
              <a href="#" class="btn btn-secondary px-4 py-3">Take a Course</a>
            </p>
          </div>
        </div>
      </div>
    </section>

    <section class="ftco-section ftco-no-pb">
      <div class="container">
        <div class="row justify-content-center mb-5 pb-2">
          <div class="col-md-8 text-center heading-section ftco-animate">
            <h2 class="mb-4">
              <span style="color: #FF69B4;">Guru</span>
              <span style="color: #888888;">Tendik</span>
            </h2>

            <p>
              “Guru yang baik itu mengajarkan dari hati, bukan hanya dari buku.”
              Di PAUD Mawar, kami percaya bahwa guru dan tenaga kependidikan
              bukan sekadar pengajar, tetapi juga pembimbing, pendengar, dan
              teladan. Setiap langkah kecil anak adalah bagian dari perjalanan
              besar mereka menuju masa depan yang cerah — dan kami bangga
              menjadi bagian dari awal kisah itu.
            </p>
          </div>
        </div>
        <div class="row">
          @foreach ($guru as $item)
            <div class="col-md-6 col-lg-3 ftco-animate">
              <div class="staff">
                <div class="img-wrap d-flex align-items-stretch">
                  <div
                    class="img align-self-stretch"
                    style="background-image: url('{{ asset('storage/' . $item->foto) }}')"
                  ></div>
                </div>
                <div class="text pt-3 text-center">
                  <h3>{{ $item->nama }}</h3>
                  <span class="position mb-2">{{ $item->jabatan }}</span>
                  <div class="faded">
                    <p>{{ $item->deskripsi ?? 'Tidak ada deskripsi.' }}</p>
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





    <section class="ftco-gallery">
      <div class="container-wrap">
        <div class="row no-gutters">
          @foreach($galeri as $item)
            <div class="col-md-3 ftco-animate">
              <a href="{{ asset('storage/' . $item->file) }}"
                class="gallery image-popup img d-flex align-items-center"
                style="background-image: url('{{ asset('storage/' . $item->file) }}');">
                <div class="icon mb-4 d-flex align-items-center justify-content-center">
                  <span class="icon-instagram"></span>
                </div>
              </a>
            </div>
          @endforeach
        </div>
      </div>
    </section>


    <!-- loader -->
    <div id="ftco-loader" class="show fullscreen">
      <svg class="circular" width="48px" height="48px">
        <circle
          class="path-bg"
          cx="24"
          cy="24"
          r="22"
          fill="none"
          stroke-width="4"
          stroke="#eeeeee"
        />
        <circle
          class="path"
          cx="24"
          cy="24"
          r="22"
          fill="none"
          stroke-width="4"
          stroke-miterlimit="10"
          stroke="#FF5E78"
        />
      </svg>
    </div>
@endsection
