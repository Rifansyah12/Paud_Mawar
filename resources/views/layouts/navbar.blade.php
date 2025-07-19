<nav
  class="navbar navbar-expand-lg navbar-dark bg-dark ftco_navbar ftco-navbar-light"
  id="ftco-navbar"
>
  <div class="container d-flex align-items-center">
    <a class="navbar-brand" href="{{ url('/') }}">Paud Mawar</a>
    <button
      class="navbar-toggler"
      type="button"
      data-toggle="collapse"
      data-target="#ftco-nav"
      aria-controls="ftco-nav"
      aria-expanded="false"
      aria-label="Toggle navigation"
    >
      <span class="oi oi-menu"></span> Menu
    </button>
    <div class="collapse navbar-collapse" id="ftco-nav">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item {{ Request::is('/') ? 'active' : '' }}">
          <a href="{{ url('/') }}" class="nav-link pl-0">Home</a>
        </li>

      <li class="nav-item dropdown">
        <a
          href="#"
          class="nav-link dropdown-toggle {{ Request::is('visi-misi','fasilitas','ekstrakulikuler','guru-tendik') ? 'active' : '' }}"
          data-toggle="dropdown"
          aria-haspopup="true"
          aria-expanded="false"
        >
          Profile
        </a>
        <div class="dropdown-menu">
          <a class="dropdown-item {{ Request::is('visi-misi') ? 'active' : '' }}" href="{{ url('visi-misi') }}">Visi dan Misi</a>
          <a class="dropdown-item {{ Request::is('fasilitas') ? 'active' : '' }}" href="{{ url('/fasilitas') }}">Fasilitas</a>
          <a class="dropdown-item {{ Request::is('ekstrakulikuler') ? 'active' : '' }}" href="{{ url('ekstrakulikuler') }}">Ekstrakulikuler</a>
          <a class="dropdown-item {{ Request::is('guru-tendik') ? 'active' : '' }}" href="{{ url('guru-tendik') }}">Guru dan Tendik</a>
        </div>
      </li>


      <li class="nav-item {{ Request::is('berita') ? 'active' : '' }}">
        <a href="{{ url('berita') }}" class="nav-link">Berita</a>
      </li>


        <li class="nav-item {{ Request::is('kesiswaan') ? 'active' : '' }}">
          <a href="{{ url('kesiswaan') }}" class="nav-link">Prestasi</a>
        </li>

        <li class="nav-item dropdown {{ Request::is('foto','video') ? 'active' : '' }}">
          <a
            href="#"
            class="nav-link dropdown-toggle"
            data-toggle="dropdown"
            aria-haspopup="true"
            aria-expanded="false"
          >
            Galeri
          </a>
          <div class="dropdown-menu">
            <a class="dropdown-item" href="{{ route('galeri.foto') }}">Foto</a>
            <a class="dropdown-item" href="{{ route('galeri.video') }}">Video</a>
          </div>
        </li>


        <li class="nav-item {{ Request::is('kontak') ? 'active' : '' }}">
          <a href="{{ url('kontak') }}" class="nav-link">Kontak</a>
        </li>

        <li class="nav-item">
          <a
            href="{{ route('pendaftaran.index') }}"
            class="nav-link"
            style="
              background-color: #00ffff;
              color: black;
              padding: 10px 15px;
              border-radius: 5px;
              margin-top: 26px;
            "
          >
            PMB2025
          </a>
        </li>

        <li class="nav-item">
          <a href="{{ route('login') }}" class="nav-link" title="Login">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
            class="bi bi-person" viewBox="0 0 16 16">
              <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
              <path fill-rule="evenodd"
                d="M8 9a5 5 0 0 0-5 5v.5a.5.5 0 0 0 .5.5h9a.5.5 0 0 0 .5-.5V14a5 5 0 0 0-5-5z" />
            </svg>
          </a>
        </li>
      </ul>
    </div>
  </div>
</nav>
