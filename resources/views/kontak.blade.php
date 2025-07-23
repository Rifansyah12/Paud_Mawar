@extends('layouts.app')

@section('title', 'kontak')

@section('content')    
    
    
    <section class="hero-wrap hero-wrap-2" style="background-image: url('images/logo/kontak.jpeg');">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
            <h1 class="mb-2 bread">Contact Us</h1>
            <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>Contact <i class="ion-ios-arrow-forward"></i></span></p>
          </div>
        </div>
      </div>
    </section>
    <section class="ftco-section contact-section">
      <div class="container">
        <div class="row d-flex mb-5 contact-info">
          
          <div class="col-md-3 d-flex">
            <div class="bg-light align-self-stretch box p-4 text-center">
              <div class="icon mb-3">
                <i class="fas fa-map-marker-alt fa-2x text-primary"></i>
              </div>
              <h3 class="mb-4">Alamat</h3>
              <p>2MQ2+RQQ, Jl. Margawangi VIII, Cijaura, Kec. Buahbatu, Kota Bandung, Jawa Barat 40287</p>
            </div>
          </div>

          <div class="col-md-3 d-flex">
            <div class="bg-light align-self-stretch box p-4 text-center">
              <div class="icon mb-3">
                <i class="fab fa-whatsapp fa-2x text-success"></i>
              </div>
              <h3 class="mb-4">Nomer Kontak</h3>
              <p><a href="https://wa.me/6281573738434" target="_blank">+62 815‑7373‑8434</a></p>
            </div>
          </div>

          <div class="col-md-3 d-flex">
            <div class="bg-light align-self-stretch box p-4 text-center">
              <div class="icon mb-3">
                <i class="fas fa-envelope fa-2x text-danger"></i>
              </div>
              <h3 class="mb-4">Email</h3>
              <p><a href="mailto:paudmawar13bdg@gmail.com">paudmawar13bdg@gmail.com</a></p>
            </div>
          </div>

          <div class="col-md-3 d-flex">
            <div class="bg-light align-self-stretch box p-4 text-center">
              <div class="icon mb-3">
                <i class="fas fa-globe fa-2x text-info"></i>
              </div>
              <h3 class="mb-4">Website</h3>
              <p><a href="#">yoursite.com</a></p>
            </div>
          </div>

        </div>
      </div>
    </section>

		<section class="ftco-section ftco-no-pt ftco-no-pb contact-section">
      <div class="container">
        <div class="row d-flex align-items-stretch no-gutters">
          <div class="col-12">
            <iframe 
              src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d126857.39559489815!2d107.560274!3d-6.903444!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e68e623e31bc0cf%3A0x66b1b9d4f2df2c5c!2sTK%20RA%20Contoh!5e0!3m2!1sid!2sid!4v1695467912345!5m2!1sid!2sid"
              width="100%" 
              height="500" 
              style="border:0;" 
              allowfullscreen="" 
              loading="lazy" 
              referrerpolicy="no-referrer-when-downgrade">
            </iframe>
          </div>
        </div>
      </div>
    </section>

@endsection
