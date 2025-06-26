<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\KesiswaanController;
use App\Http\Controllers\GaleriController;
use App\Http\Controllers\AdminCalonSiswaController;
use App\Http\Controllers\PendaftaranController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.submit');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/password/reset', function () {
    return view('auth.passwords.email');  // nanti buat view ini
})->name('password.request');


// User Umum
Route::get('/berita', [BeritaController::class, 'index'])->name('berita.index');
Route::get('/kesiswaan', [KesiswaanController::class, 'index'])->name('kesiswaan.index');
    // Galeri
    Route::get('/foto', [GaleriController::class, 'foto'])->name('galeri.foto');
    Route::get('/video', [GaleriController::class, 'video'])->name('galeri.video');

// Pendaftaran
// Menampilkan daftar pendaftar
Route::get('/pendaftaran', [PendaftaranController::class, 'index'])->name('pendaftaran.index');

// Menampilkan data calis pendaftaran
Route::get('//admin/calon-siswa', [PendaftaranController::class, 'create'])->name('pendaftaran.index');

// Menyimpan data pendaftaran
Route::post('/pendaftaran', [PendaftaranController::class, 'store'])->name('pendaftaran.store');

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


