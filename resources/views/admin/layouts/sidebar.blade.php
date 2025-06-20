<div class="sidebar">
  <h3>Admin</h3>
  <a href="#" class="active">
    <i class="fas fa-tachometer-alt mr-2"></i> Beranda
  </a>
  <div class="dropdown">
    <a href="#" class="dropdown-toggle" data-toggle="collapse" data-target="#submenu-profile" aria-expanded="false" aria-controls="submenu-profile">
      <i class="fas fa-user mr-2"></i> Profile
    </a>
    <div class="collapse" id="submenu-profile">
      <a href="tentang-kami.html" class="pl-4 d-block text-white">Tentang Kami</a>
      <a href="visi-misi.html" class="pl-4 d-block text-white">Visi Misi</a>
      <a href="fasilitas.html" class="pl-4 d-block text-white">Fasilitas</a>
      <a href="ekstrakulikuler.html" class="pl-4 d-block text-white">Ekstra Kulikuler</a>
      <a href="guru.html" class="pl-4 d-block text-white">Guru</a>
    </div>
  </div>
  <a href="berita.html"><i class="fas fa-newspaper mr-2"></i> Berita</a>
  <div class="dropdown">
    <a href="#" class="dropdown-toggle" data-toggle="collapse" data-target="#submenu-galeri" aria-expanded="false" aria-controls="submenu-galeri">
      <i class="fas fa-image mr-2"></i> Galeri
    </a>
    <div class="collapse" id="submenu-galeri">
      <a href="gambar.html" class="pl-4 d-block text-white">Gambar</a>
      <a href="vidio.html" class="pl-4 d-block text-white">Vidio</a>
    </div>
  </div>
  <a href="kritik-testimoni.html"><i class="fas fa-comment-dots mr-2"></i> Kritik (Testimoni)</a>
  <a href="kelola-pendaftaran.html"><i class="fas fa-file-alt mr-2"></i> Kelola Pendaftaran</a>
    <form action="{{ route('logout') }}" method="POST" style="margin:0; padding:0;">
    @csrf
   <button><i class="fas fa-sign-out-alt mr-2"></i> Logout</button>
</form>
</div>
