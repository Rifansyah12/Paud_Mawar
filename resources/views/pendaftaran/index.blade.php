@extends('layouts.app')

@section('title', 'PMB')

@section('content')
    <section class="hero-wrap hero-wrap-2" style="background-image: url('images/bg_2.jpg');">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
            <h1 class="mb-2 bread">PMB</h1>
            <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>PMB <i class="ion-ios-arrow-forward"></i></span></p>
          </div>
        </div>
      </div>
    </section>

    <!-- Form -->
     <section class="ftco-section">
        <div class="container">
            <h2 class="mb-4 text-center">Form Pendaftaran</h2>

            @if(session('success'))
            <div class="alert alert-success text-center">
                {{ session('success') }}
            </div>
            @else

            <form action="{{ route('pendaftaran.store') }}" method="POST">
            @csrf
            <div class="row">
                <div class="col-md-6">
                <div class="form-group">
                    <label>NIK</label>
                    <input type="text" name="nik" class="form-control" required maxlength="16">
                </div>
                <div class="form-group">
                    <label>Nama</label>
                    <input type="text" name="nama" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>Umur</label>
                    <input type="number" name="umur" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>Jenis Kelamin</label>
                    <select name="jenis_kelamin" class="form-control" required>
                    <option value="">Pilih</option>
                    <option value="Laki-laki">Laki-laki</option>
                    <option value="Perempuan">Perempuan</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Jumlah Saudara</label>
                    <input type="number" name="jumlah_saudara" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>Anak ke-</label>
                    <input type="number" name="anak_ke" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>Negara</label>
                    <input type="text" name="negara" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>Agama</label>
                    <input type="text" name="agama" class="form-control" required>
                </div>
                </div>

                <div class="col-md-6">
                <div class="form-group">
                    <label>Tinggal Bersama</label>
                    <input type="text" name="tinggal_bersama" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>Alamat</label>
                    <textarea name="alamat" class="form-control" required></textarea>
                </div>
                <div class="form-group">
                    <label>Tinggi Badan (cm)</label>
                    <input type="number" name="tinggi_badan" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>Berat Badan (kg)</label>
                    <input type="number" name="berat_badan" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>Jarak Tempuh ke Sekolah (km)</label>
                    <input type="number" name="jaraktempuh" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>Nama Ayah</label>
                    <input type="text" name="nama_ayah" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>Nama Ibu</label>
                    <input type="text" name="nama_ibu" class="form-control" required>
                </div>
                </div>

                <div class="col-md-12 text-center mt-4">
                <button type="submit" class="btn btn-primary px-5 py-2">Kirim Pendaftaran</button>
                </div>
            </div>
            </form>
             @endif
        </div>
    </section>
@endsection
