<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BeritaController;


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


// Dashboard admin (hanya bisa diakses saat login)
Route::get('/dashboard', function () {
    return view('admin.index');
})->middleware('auth')->name('dashboard');
