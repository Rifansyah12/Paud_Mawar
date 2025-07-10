<div class="sidebar">
  <h3>Admin</h3>
  <a href="{{ route('dashboard') }}" class="active">
    <i class="fas fa-tachometer-alt mr-2"></i> Beranda
  </a>
  <a href="{{ route('admin.calon_siswa.index') }}">
  <i class="fas fa-child mr-2"></i> Calon Siswa
  </a>
  <div class="dropdown">
    <a href="#" class="dropdown-toggle" data-toggle="collapse" data-target="#submenu-profile" aria-expanded="false" aria-controls="submenu-profile">
      <i class="fas fa-user mr-2"></i> Profile
    </a>
    <div class="collapse" id="submenu-profile">
      <a href="tentang-kami.html" class="pl-4 d-block text-white">Tentang Kami</a>
      <a href="{{ route('admin.visimisi.index') }}" class="pl-4 d-block text-white">Visi Misi</a>
      <a href="{{ route('admin.fasilitas.index') }}" class="pl-4 d-block text-white">Fasilitas</a>
      <a href="{{ route('admin.ekstrakulikuler.index') }}" class="pl-4 d-block text-white">Ekstra Kulikuler</a>
      <a href="{{ route('admin.gurutendik.index') }}" class="pl-4 d-block text-white">Guru</a>
    </div>
  </div>
  <a href="{{route ('admin.berita.index')}}"><i class="fas fa-newspaper mr-2"></i> Berita</a>
    <a href="{{ route('admin.kesiswaan.index') }}">
    <i class="fas fa-award mr-2"></i> Prestasi
  </a>
  <div class="dropdown">
    <a href="#" class="dropdown-toggle" data-toggle="collapse" data-target="#submenu-galeri" aria-expanded="false" aria-controls="submenu-galeri">
      <i class="fas fa-image mr-2"></i> Galeri
    </a>
    <div class="collapse" id="submenu-galeri">
      <a href="{{ route('admin.galeri.foto') }}" class="pl-4 d-block text-white">Kelola Gambar</a>
      <a href="{{ route('admin.galeri.video') }}" class="pl-4 d-block text-white">Kelola Video</a>
    </div>
  </div>
  <a href="kritik-testimoni.html"><i class="fas fa-comment-dots mr-2"></i> Kritik (Testimoni)</a>
  <a href="{{ route('admin.kelola_siswa_baru') }}">
    <i class="fas fa-file-alt mr-2"></i> Kelola Siswa Baru
</a>
    <form action="{{ route('logout') }}" method="POST" style="margin:0; padding:0;">
    @csrf
   <button><i class="fas fa-sign-out-alt mr-2"></i> Logout</button>
</form>
</div>
