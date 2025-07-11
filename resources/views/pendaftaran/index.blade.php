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

        {{-- Notifikasi Sukses --}}
        @if(session('success'))
        <div class="alert alert-success text-center">
            {{ session('success') }}
        </div>
        @endif

        {{-- Notifikasi Error --}}
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <form action="{{ route('pendaftaran.store') }}" method="POST">
            @csrf
            <div class="row">
                {{-- DATA CALON SISWA --}}
                <div class="col-md-6">
                    <h5>Data Calon Siswa</h5>

                    <div class="form-group">
                        <label>Tanggal Daftar</label>
                        <input type="date" name="tanggal_daftar" class="form-control" value="{{ \Carbon\Carbon::now()->toDateString() }}" readonly>
                    </div>

                    <div class="form-group">
                        <label>Nama Lengkap</label>
                        <input type="text" name="nama_lengkap" class="form-control" required>
                            @error('nama_lengkap')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                    </div>

                    <div class="form-group">
                        <label>Jenis Kelamin</label>
                        <select name="jenis_kelamin" class="form-control" required>
                            <option value="">-- Pilih --</option>
                            <option value="Laki-laki">Laki-laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>NISN</label>
                        <input type="text" name="nisn" class="form-control" maxlength="10" required>
                            @error('nisn')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                    </div>

                    <div class="form-group">
                        <label>NIK</label>
                        <input type="text" name="nik" class="form-control" maxlength="16" required>
                        @error('nik')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Tempat Lahir</label>
                        <input type="text" name="tempat_lahir" class="form-control" required>
                        @error('tempat_lahir')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Tanggal Lahir</label>
                        <input type="date" name="tanggal_lahir" class="form-control" required>
                        @error('tanggal_lahir')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Agama</label>
                        <input type="text" name="agama" class="form-control" required>
                        @error('agama')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="berkebutuhan_khusus">Berkebutuhan Khusus <span style="color:red;">*</span></label>
                        <select name="berkebutuhan_khusus" id="berkebutuhan_khusus" class="form-control" required onchange="toggleKeteranganSiswa(this.value)">
                            <option value="" disabled selected>-- Pilih --</option>
                            <option value="Tidak">Tidak</option>
                            <option value="Iya">Iya</option>
                        </select>
                    </div>

                    <div class="form-group" id="keterangan_khusus_siswa_group" style="display: none;">
                        <label for="keterangan_khusus_siswa">Keterangan Berkebutuhan Khusus</label>
                        <input type="text" name="keterangan_khusus_siswa" id="keterangan_khusus_siswa" class="form-control">
                    </div>

                    <div class="form-group">
                        <label>Jumlah Saudara</label>
                        <input type="number" name="jumlah_saudara" class="form-control" required>
                        @error('jumlah_saudara')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>

                {{-- ALAMAT & KONTAK --}}
                <div class="col-md-6">
                    <h5>Alamat & Kontak</h5>

                    <div class="form-group">
                        <label>Dusun</label>
                        <input type="text" name="dusun" class="form-control">
                        @error('dusun')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Desa/Kelurahan</label>
                        <input type="text" name="desa" class="form-control">
                        @error('desa')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Kode Pos</label>
                        <input type="text" name="kode_pos" class="form-control">
                        @error('kode_pos')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Kecamatan</label>
                        <input type="text" name="kecamatan" class="form-control">
                        @error('kecamatan')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Kabupaten/Kota</label>
                        <input type="text" name="kab_kota" class="form-control">
                        @error('kab_kota')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Provinsi</label>
                        <input type="text" name="provinsi" class="form-control">
                        @error('provinsi')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Alat Transportasi ke Sekolah</label>
                        <select name="alat_transportasi" class="form-control" required>
                            <option value="">-- Pilih --</option>
                            <option>Jalan Kaki</option>
                            <option>Kendaraan Pribadi</option>
                            <option>Angkutan Umum/Bus</option>
                            <option>Mobil/Bus Jemputan</option>
                            <option>Kereta Api</option>
                            <option>Ojek</option>
                            <option>Andong</option>
                            <option>Mobil Pribadi</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Jenis Tinggal</label>
                        <select name="jenis_tinggal" class="form-control" required>
                            <option value="">-- Pilih --</option>
                            <option>Bersama Orang Tua</option>
                            <option>Wali</option>
                            <option>Kost</option>
                            <option>Asrama</option>
                            <option>Panti Asuhan</option>
                            <option>Lainnya</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>No. Telp Rumah</label>
                        <input type="text" name="no_telp_rumah" class="form-control">
                        @error('no_tlp_rumah')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>No. HP</label>
                        <input type="text" name="no_hp" class="form-control">
                        @error('no_hp')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" name="email" class="form-control">
                        @error('email')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>

                {{-- DATA PERIODIK --}}
                <div class="col-md-12 mt-4">
                    <h5>Data Periodik Calon Siswa</h5>

                    <div class="form-group">
                        <label>Tinggi Badan (cm)</label>
                        <input type="number" name="tinggi_badan" class="form-control" required>
                        @error('tinggi_badan')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Berat Badan (kg)</label>
                        <input type="number" name="berat_badan" class="form-control" required>
                        @error('berart_badan')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Jarak ke Sekolah (km)</label>
                        <input type="number" name="jarak_ke_sekolah" class="form-control" required>
                        @error('jarak_ke_sekolah')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Waktu Tempuh ke Sekolah (menit)</label>
                        <input type="number" name="waktu_tempuh_ke_sekolah" class="form-control" required>
                        @error('waktu_tempuh_ke_sekolah')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>

                {{-- DATA AYAH --}}
                <div class="col-md-6 mt-4">
                    <h5>Data Ayah <span class="text-danger">(Wajib Diisi)</span></h5>

                    <div class="form-group">
                        <label>NIK Ayah</label>
                        <input type="text" name="nik_ayah" class="form-control" required>
                            @error('nik_ayah')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                    </div>

                    <div class="form-group">
                        <label>Nama Ayah</label>
                        <input type="text" name="nama_ayah" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label>Tahun Lahir Ayah</label>
                        <input type="text" name="tahun_lahir_ayah" class="form-control" required maxlength="4">
                    </div>

                    <div class="form-group">
                        <label>Pekerjaan Ayah</label>
                        <select name="pekerjaan_ayah" class="form-control" required>
                            <option value="">-- Pilih --</option>
                            <option>Tidak Bekerja</option>
                            <option>Nelayan</option>
                            <option>Petani</option>
                            <option>Peternak</option>
                            <option>PNS/TNI/Polri</option>
                            <option>Karyawan Swasta</option>
                            <option>Wiraswasta</option>
                            <option>Wirausaha</option>
                            <option>Buruh</option>
                            <option>Lainnya</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="pendidikan_ayah">Pendidikan Ayah <span style="color:red;">*</span></label>
                        <select name="pendidikan_ayah" class="form-control" required>
                            <option value="" disabled selected>-- Wajib diisi --</option>
                            <option value="Tidak">Tidak</option>
                            <option value="Paud">Paud</option>
                            <option value="Tk/Sederajat">Tk/Sederajat</option>
                            <option value="Putus SD">Putus SD</option>
                            <option value="SD/sederajat">SD/sederajat</option>
                            <option value="SMP/sederajat">SMP/sederajat</option>
                            <option value="SMA/sederajat">SMA/sederajat</option>
                            <option value="Paket A">Paket A</option>
                            <option value="Paket B">Paket B</option>
                            <option value="Paket C">Paket C</option>
                            <option value="D1">D1</option>
                            <option value="D2">D2</option>
                            <option value="D3">D3</option>
                            <option value="S1">S1</option>
                            <option value="S2">S2</option>
                            <option value="S3">S3</option>
                            <option value="Non formal">Non formal</option>
                            <option value="Informal">Informal</option>
                            <option value="Lainnya">Lainnya</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="penghasilan_ayah">Penghasilan Ayah <span style="color:red;">*</span></label>
                        <select name="penghasilan_ayah" class="form-control" required>
                            <option value="" disabled selected>-- Wajib diisi --</option>
                            <option value="Kurang dari 500,000">Kurang dari 500,000</option>
                            <option value="Rp500.000 - Rp999.999">Rp500.000 - Rp999.999</option>
                            <option value="Rp1.000.000 - Rp1.999.999">Rp1.000.000 - Rp1.999.999</option>
                            <option value="Rp2.000.000 - Rp4.999.999">Rp2.000.000 - Rp4.999.999</option>
                            <option value="Rp5.000.000 - Rp20.000.000">Rp5.000.000 - Rp20.000.000</option>
                            <option value="Lebih dari Rp20.000.000">Lebih dari Rp20.000.000</option>
                        </select>
                    </div>


                   <div class="form-group">
                        <label for="berkebutuhan_khusus_ayah">Berkebutuhan Khusus Ayah <span style="color:red;">*</span></label>
                        <select name="berkebutuhan_khusus_ayah" id="berkebutuhan_khusus_ayah" class="form-control" required onchange="toggleKeteranganAyah(this.value)">
                            <option value="" disabled selected>-- Pilih --</option>
                            <option value="Tidak">Tidak</option>
                            <option value="Iya">Iya</option>
                        </select>
                    </div>

                    <div class="form-group" id="keterangan_khusus_ayah_group" style="display: none;">
                        <label for="keterangan_khusus_ayah">Keterangan Berkebutuhan Khusus</label>
                        <input type="text" name="keterangan_khusus_ayah" id="keterangan_khusus_ayah" class="form-control">
                    </div>
                </div>

                {{-- DATA IBU --}}
                <div class="col-md-6 mt-4">
                    <h5>Data Ibu <span class="text-danger">(Wajib Diisi)</span></h5>

                    <div class="form-group">
                        <label>NIK Ibu</label>
                        <input type="text" name="nik_ibu" class="form-control" required oninput="this.value = this.value.replace(/[^0-9]/g, '')" maxlength="16">
                        @error('nik_ibu')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Nama Ibu</label>
                        <input type="text" name="nama_ibu" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label>Tahun Lahir Ibu</label>
                        <input type="text" name="tahun_lahir_ibu" class="form-control" required maxlength="4">
                    </div>

                    <div class="form-group">
                        <label for="pekerjaan_ibu">Pekerjaan Ibu <span style="color:red;">*</span></label>
                        <select name="pekerjaan_ibu" class="form-control" required>
                            <option value="" disabled selected>-- Wajib diisi --</option>
                            <option value="Tidak bekerja">Tidak bekerja</option>
                            <option value="Nelayan">Nelayan</option>
                            <option value="Petani">Petani</option>
                            <option value="Peternak">Peternak</option>
                            <option value="PNS">PNS</option>
                            <option value="Karyawan swasta">Karyawan swasta</option>
                            <option value="Pedagang besar">Pedagang besar</option>
                            <option value="Pedagang kecil">Pedagang kecil</option>
                            <option value="Wiraswasta">Wiraswasta</option>
                            <option value="Wira usaha">Wira usaha</option>
                            <option value="Buruh">Buruh</option>
                            <option value="Pensiun">Pensiun</option>
                        </select>
                    </div>


                    <div class="form-group">
                        <label for="pendidikan_ibu">Pendidikan Ibu <span style="color:red;">*</span></label>
                        <select name="pendidikan_ibu" class="form-control" required>
                            <option value="" disabled selected>-- Wajib diisi --</option>
                            <option value="Tidak">Tidak</option>
                            <option value="Paud">Paud</option>
                            <option value="Tk/Sederajat">Tk/Sederajat</option>
                            <option value="Putus SD">Putus SD</option>
                            <option value="SD/sederajat">SD/sederajat</option>
                            <option value="SMA/sederajat">SMA/sederajat</option>
                            <option value="SMP/sederajat">SMP/sederajat</option>
                            <option value="Paket A">Paket A</option>
                            <option value="Paket B">Paket B</option>
                            <option value="Paket C">Paket C</option>
                            <option value="D1">D1</option>
                            <option value="D2">D2</option>
                            <option value="D3">D3</option>
                            <option value="S1">S1</option>
                            <option value="S2">S2</option>
                            <option value="S3">S3</option>
                            <option value="Non formal">Non formal</option>
                            <option value="Informal">Informal</option>
                            <option value="Lainnya">Lainnya</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="penghasilan_ibu">Penghasilan Ibu <span style="color:red;">*</span></label>
                        <select name="penghasilan_ibu" class="form-control" required>
                            <option value="" disabled selected>-- Wajib diisi --</option>
                            <option value="Kurang dari 500.000">Kurang dari 500.000</option>
                            <option value="Rp500.000 - Rp999.999">Rp500.000 - Rp999.999</option>
                            <option value="Rp1.000.000 - Rp1.999.999">Rp1.000.000 - Rp1.999.999</option>
                            <option value="Rp2.000.000 - Rp4.999.999">Rp2.000.000 - Rp4.999.999</option>
                            <option value="Rp5.000.000 - Rp20.000.000">Rp5.000.000 - Rp20.000.000</option>
                            <option value="Lebih dari Rp20.000.000">Lebih dari Rp20.000.000</option>
                        </select>
                    </div>


                    <div class="form-group">
                        <label for="berkebutuhan_khusus_ibu">Berkebutuhan Khusus Ibu <span style="color:red;">*</span></label>
                        <select name="berkebutuhan_khusus_ibu" id="berkebutuhan_khusus_ibu" class="form-control" required onchange="toggleKeteranganIbu(this.value)">
                            <option value="" disabled selected>-- Pilih --</option>
                            <option value="Tidak">Tidak</option>
                            <option value="Iya">Iya</option>
                        </select>
                    </div>

                    <div class="form-group" id="keterangan_khusus_ibu_group" style="display: none;">
                        <label for="keterangan_khusus_ibu">Keterangan Berkebutuhan Khusus</label>
                        <input type="text" name="keterangan_khusus_ibu" id="keterangan_khusus_ibu" class="form-control">
                    </div>
                </div>

                {{-- SUBMIT --}}
                <div class="col-md-12 text-center mt-4">
                    <button type="submit" class="btn btn-primary px-5 py-2">Kirim Pendaftaran</button>
                </div>
            </div>
        </form>
    </div>
</section>

@endsection

<script>
    function toggleKeteranganIbu(value) {
        var group = document.getElementById('keterangan_khusus_ibu_group');
        var input = document.getElementById('keterangan_khusus_ibu');
        if (value === 'Iya') {
            group.style.display = 'block';
            input.required = true;
        } else {
            group.style.display = 'none';
            input.required = false;
            input.value = '';
        }
    }
</script>
<script>
    function toggleKeteranganAyah(value) {
        var group = document.getElementById('keterangan_khusus_ayah_group');
        var input = document.getElementById('keterangan_khusus_ayah');
        if (value === 'Iya') {
            group.style.display = 'block';
            input.required = true;
        } else {
            group.style.display = 'none';
            input.required = false;
            input.value = '';
        }
    }
</script>
<script>
    function toggleKeteranganSiswa(value) {
        var group = document.getElementById('keterangan_khusus_siswa_group');
        var input = document.getElementById('keterangan_khusus_siswa');
        if (value === 'Iya') {
            group.style.display = 'block';
            input.required = true;
        } else {
            group.style.display = 'none';
            input.required = false;
            input.value = '';
        }
    }
</script>