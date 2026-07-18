<?php

use Illuminate\Support\Facades\Route;

Route::get('/', fn () => view('homepage'))->name('beranda');

// Profil
Route::get('/profil/profil-desa', fn () => view('profil.profil-desa'))->name('profil.desa');
Route::get('/profil/visi-misi', fn () => view('profil.visi-misi'))->name('profil.visi-misi');
Route::get('/profil/sejarah', fn () => view('profil.sejarah'))->name('profil.sejarah');
Route::get('/profil/perangkat-desa', fn () => view('profil.perangkat-desa'))->name('profil.perangkat-desa');

// Rangkup & Lembaga Desa
Route::get('/profil/rangkup', fn () => view('profil.rangkup'))->name('profil.rangkup');
Route::get('/profil/rangkup/bumdes', fn () => view('profil.bumdes'))->name('profil.bumdes');
Route::get('/profil/rangkup/lembaga-desa', fn () => view('profil.lembaga-desa'))->name('profil.lembaga-desa');

Route::get('/profil/rangkup/lembaga-desa/lpm', fn () => view('lembaga.lpm'))->name('lembaga.lpm');
Route::get('/profil/rangkup/lembaga-desa/pkk', fn () => view('lembaga.pkk'))->name('lembaga.pkk');
Route::get('/profil/rangkup/lembaga-desa/karang-taruna', fn () => view('lembaga.karang-taruna'))->name('lembaga.karang-taruna');

// Halaman lainnya
Route::get('/berita', fn () => view('berita'))->name('berita');
Route::get('/layanan', fn () => view('layanan'))->name('layanan');
Route::get('/residensial', fn () => view('residensial'))->name('residensial');
Route::get('/galeri', fn () => view('galeri'))->name('galeri');
Route::get('/kontak', fn () => view('kontak'))->name('kontak');