<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\AdminBeritaController;
use App\Http\Controllers\Admin\AdminKesiswaanController;
use App\Http\Controllers\Admin\AdminGurutendikController;
use App\Http\Controllers\Admin\AdminEkstrakulikulerController;
use App\Http\Controllers\Admin\AdminFasilitasController;
use App\Http\Controllers\Admin\AdminVisimisController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\KesiswaanController;
use App\Http\Controllers\FasilitasController;
use App\Http\Controllers\EkstrakulikulerController;
use App\Http\Controllers\GaleriController;
use App\Http\Controllers\PendaftaranController;
use App\Http\Controllers\AdminCalonSiswaController;
use App\Http\Controllers\VisimisiController;
use App\Http\Controllers\GurutendikController;
use App\Http\Controllers\KontakController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LandingController;

use App\Models\Pendaftaran;
use App\Http\Middleware\RoleMiddleware;


use App\Http\Controllers\Pengelola\CalonSiswaController;
use App\Http\Controllers\Pengelola\DataSiswaBaruController;
use App\Http\Controllers\Pengelola\DataKelasController;
use App\Http\Controllers\Pengelola\LaporanController;

Route::get('/', [GaleriController::class, 'landing']);

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.submit');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/password/reset', function () {
    return view('auth.passwords.email');  // nanti buat view ini
})->name('password.request');


// User Umum
Route::get('/berita', [BeritaController::class, 'index'])->name('berita.index');

Route::get('/kesiswaan', [KesiswaanController::class, 'index'])->name('kesiswaan.index');
Route::get('/kesiswaan/{id}', [KesiswaanController::class, 'show'])->name('kesiswaan.show');
Route::get('/fasilitas', [FasilitasController::class, 'show']);
Route::get('/ekstrakulikuler', [EkstrakulikulerController::class, 'show']);
Route::get('/guru-tendik', [GurutendikController::class, 'show']);
Route::get('/kontak',[KontakController::class,'show']);

    // Galeri
    Route::get('/foto', [GaleriController::class, 'foto'])->name('galeri.foto');
    Route::get('/video', [GaleriController::class, 'video'])->name('galeri.video');
    // Visi-misi
    Route::get('/visi-misi', [VisimisiController::class, 'show']);

// Pendaftaran
// Menampilkan daftar pendaftar
Route::get('/pendaftaran', [PendaftaranController::class, 'index'])->name('pendaftaran.index');
Route::put('/admin/calon-siswa/{id}', [PendaftaranController::class, 'update'])->name('admin.calon_siswa.update');


// Menampilkan data calis pendaftaran
Route::get('//admin/calon-siswa', [PendaftaranController::class, 'create'])->name('pendaftaran.create');
Route::get('/admin/calon-siswa/export', [PendaftaranController::class, 'export'])->name('admin.calon_siswa.export');


// Menyimpan data pendaftaran
Route::post('/pendaftaran', [PendaftaranController::class, 'store'])->name('pendaftaran.store');
Route::get('/pendaftaran/unduh/{id}', [PendaftaranController::class, 'unduhFormulir'])->name('pendaftaran.unduh');
Route::get('/pendaftaran/berhasil/{id}', [PendaftaranController::class, 'berhasil'])->name('pendaftaran.berhasil');



// Halaman edit pendaftaran
// Route::get('/pendaftaran/{id}/edit', [PendaftaranController::class, 'edit'])->name('pendaftaran.edit');

// // Proses update data pendaftaran
// Route::put('/pendaftaran/{id}', [PendaftaranController::class, 'update'])->name('pendaftaran.update');

// Dashboard admin (hanya bisa diakses saat login)
Route::get('/dashboard', function () {
    return view('admin.dashboard.index');
})->middleware('auth')->name('dashboard');

// Route::get('/calon-siswa', function () {
//     return view('admin.calon_siswa.index');
// })->middleware('auth')->name('admin.calon_siswa.index');

// Halaman daftar calon siswa
Route::get('/admin/calon-siswa', [AdminCalonSiswaController::class, 'index'])->name('admin.calon_siswa.index');
Route::delete('/admin/calon-siswa/{id}', [AdminCalonSiswaController::class, 'destroy'])->name('admin.calon_siswa.destroy');
// Konfirmasi pendaftaran
Route::put('/admin/calon-siswa/{id}/konfirmasi', [AdminCalonSiswaController::class, 'konfirmasi'])->name('admin.calon_siswa.konfirmasi');
Route::get('/admin/kelola-siswa-baru', [App\Http\Controllers\AdminCalonSiswaController::class, 'siswaTerkonfirmasi'])->name('admin.kelola_siswa_baru');
// galeri
Route::get('/admin/galeri/foto', [GaleriController::class, 'foto'])->name('galeri.foto');
Route::get('/admin/galeri/video', [GaleriController::class, 'video'])->name('galeri.video');
Route::get('/admin/galeri/foto', [GaleriController::class, 'Adminfoto'])->name('admin.galeri.foto');
Route::get('/admin/galeri/video', [GaleriController::class, 'Adminvideo'])->name('admin.galeri.video');

// Admin kelola Galeri Foto
Route::get('/admin/galeri/foto/create', [GaleriController::class, 'createFoto'])->name('galeri.create');
Route::post('/admin/galeri/foto', [GaleriController::class, 'storeFoto'])->name('galeri.store');
Route::get('/admin/galeri/foto/{id}/edit', [GaleriController::class, 'editFoto'])->name('galeri.edit');
Route::put('/admin/galeri/foto/{id}', [GaleriController::class, 'updateFoto'])->name('galeri.update');
Route::delete('/admin/galeri/foto/{id}', [GaleriController::class, 'destroy'])->name('galeri.destroy');
// Admin kelola Galeri Vidio
Route::prefix('admin/galeri')->group(function () {
    Route::get('video', [GaleriController::class, 'Adminvideo'])->name('admin.galeri.video');
    Route::get('video/create', [GaleriController::class, 'createVideo'])->name('admin.galeri.video.create');
    Route::post('video', [GaleriController::class, 'storeVideo'])->name('admin.galeri.video.store');
    Route::get('video/{id}/edit', [GaleriController::class, 'editVideo'])->name('admin.galeri.video.edit');
    Route::put('video/{id}', [GaleriController::class, 'updateVideo'])->name('admin.galeri.video.update');
    Route::delete('video/{id}', [GaleriController::class, 'destroyVideo'])->name('admin.galeri.video.destroy');
});


Route::get('/admin/berita', [AdminBeritaController::class, 'index'])->name('admin.berita.index');
Route::get('/admin/berita/create', [AdminBeritaController::class, 'create'])->name('admin.berita.create');
Route::post('/admin/berita', [AdminBeritaController::class, 'store'])->name('admin.berita.store');
Route::get('/admin/berita/{berita}/edit', [AdminBeritaController::class, 'edit'])->name('admin.berita.edit');
Route::put('/admin/berita/{berita}', [AdminBeritaController::class, 'update'])->name('admin.berita.update');
Route::delete('/admin/berita/{berita}', [AdminBeritaController::class, 'destroy'])->name('admin.berita.destroy');
Route::get('/berita/{id}', [BeritaController::class, 'show'])->name('berita.show');


// Addmin Kesiswa
Route::get('/admin/kesiswaan', [AdminKesiswaanController::class, 'index'])->name('admin.kesiswaan.index');
Route::get('/admin/kesiswaan/create', [AdminKesiswaanController::class, 'create'])->name('admin.kesiswaan.create');
Route::post('/admin/kesiswaan', [AdminKesiswaanController::class, 'store'])->name('admin.kesiswaan.store');
Route::get('/admin/kesiswaan/{id}/edit', [AdminKesiswaanController::class, 'edit'])->name('admin.kesiswaan.edit');
Route::put('/admin/kesiswaan/{id}', [AdminKesiswaanController::class, 'update'])->name('admin.kesiswaan.update');
Route::delete('/admin/kesiswaan/{id}', [AdminKesiswaanController::class, 'destroy'])->name('admin.kesiswaan.destroy');

// // AdminKontent
// Route::get('/admin/visimisi', function () {
//     return view('admin.visimisi.index');
// })->name('admin.visimisi');
// Route::get('/admin/fasilitas', function () {
//     return view('admin.fasilitas.index');
// })->name('admin.fasilitas');
// Route::get('/admin/ekstrakulikuler', function () {
//     return view('admin.ekstrakulikuler.index');
// })->name('admin.ekstrakulikuler');
// Route::get('/admin/gurutendik', function () {
//     return view('admin.gurutendik.index');
// })->name('admin.gurutendik');
// Untuk pengunjung
Route::get('/visimisi', [VisiMisiController::class, 'show']);
Route::get('/', [GaleriController::class, 'landing'])->name('welcome');

Route::prefix('admin')->name('admin.')->group(function () {
    Route::resource('visimisi', AdminVisimisController::class);
    Route::resource('fasilitas', AdminFasilitasController::class);
    Route::resource('ekstrakulikuler', AdminEkstrakulikulerController::class);
    Route::resource('gurutendik', AdminGurutendikController::class);
});

// Role Actor
Route::middleware(['auth', RoleMiddleware::class . ':admin'])->group(function () {
    Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
});

Route::middleware(['auth', RoleMiddleware::class . ':pengelola'])->group(function () {
    Route::get('/pengelola/dashboard', function () {
        return view('pengelola.dashboard.index');
    });
});





Route::middleware(['web', 'auth', RoleMiddleware::class.':pengelola'])->prefix('pengelola')->group(function () {
    Route::get('/calon_siswa', [CalonSiswaController::class, 'index'])->name('pengelola.calon_siswa');
    Route::get('/data_siswa_baru', [DataSiswaBaruController::class, 'index'])->name('pengelola.data_siswa_baru');
    Route::put('/data_siswa_baru/{id}', [DataSiswaBaruController::class, 'update'])->name('pengelola.data_siswa_baru.update');
    Route::delete('/data_siswa_baru/{id}',[DataSiswaBaruController::class, 'destroy'])->name('pengelola.data_siswa_baru.destroy');
    Route::post('/data_siswa_baru/{id}/masukkan-kelas', [DataSiswaBaruController::class, 'masukkanKelas'])->name('pengelola.data_siswa_baru.masuk_kelas');
    Route::put('calon_siswa/{id}/konfirmasi', [CalonSiswaController::class, 'update'])->name('pengelola.calon_siswa.konfirmasi');
  
    // Data kelas
    Route::get('/data-kelas', [DataKelasController::class, 'index'])->name('kelas.index');
    Route::get('/data_kelas', [DataKelasController::class, 'index'])->name('pengelola.data_kelas');
    Route::post('/kelas', [DataKelasController::class, 'store'])->name('kelas.store');
    Route::put('/kelas/{id}', [DataKelasController::class, 'update'])->name('kelas.update');
    Route::delete('/kelas/{id}', [DataKelasController::class, 'destroy'])->name('kelas.destroy');

    Route::put('/siswa/{id}/update-kelas', [DataSiswaBaruController::class, 'updateKelas'])->name('siswa.update.kelas');
    Route::get('/kelas/{id}/export-siswa', [DataKelasController::class, 'exportSiswa'])->name('kelas.export.siswa');





    Route::get('/laporan', [LaporanController::class, 'index'])->name('pengelola.laporan');
});
