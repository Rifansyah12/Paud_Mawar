<!-- Sidebar Pengelola -->
<div class="d-flex flex-column flex-shrink-0 p-3 text-white bg-dark" style="width: 250px; height: 100vh;">
    <a href="{{ url('/pengelola/dashboard') }}" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
        <span class="fs-4">Pengelola</span>
    </a>
    <hr>
    <ul class="nav nav-pills flex-column mb-auto">
        <li class="nav-item">
            <a href="{{ url('/pengelola/dashboard') }}" class="nav-link text-white">
                Dashboard
            </a>
        </li>
        <li>
            <a href="{{ url('/pengelola/calon_siswa') }}" class="nav-link text-white">
                Calon Siswa
            </a>
        </li>
        <li>
            <a href="{{ url('/pengelola/data_siswa_baru') }}" class="nav-link text-white">
                Data siswa baru
            </a>
        </li>
        <li>
            <a href="{{ url('/pengelola/data_kelas') }}" class="nav-link text-white">
                Data Kelas
            </a>
        </li>
        <li>
            <a href="#" class="nav-link text-white">
                Laporan
            </a>
        </li>
    </ul>
    <hr>
    <div>
        <a href="{{ route('logout') }}"
           onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
           class="btn btn-danger w-100">
            Logout
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>
    </div>
</div>
