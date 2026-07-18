<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('homepage');
})->name('beranda');

Route::get('/profil/profil-desa', function () {
    return view('profil.profil-desa');
})->name('profil.desa');

Route::get('/profil/visi-misi', function () {
    return view('profil.visi-misi');
})->name('profil.visi-misi');

Route::get('/profil/rangkup', function () {
    return view('profil.rangkup');
})->name('profil.rangkup');

Route::get('/profil/sejarah', function () {
    return view('profil.sejarah');
})->name('profil.sejarah');

Route::get('/profil/perangkat-desa', function () {
    return view('profil.perangkat-desa');
})->name('profil.perangkat-desa');

Route::get('/berita', function () {
    return view('berita');
})->name('berita');

Route::get('/layanan', function () {
    return view('layanan');
})->name('layanan');

Route::get('/residensial', function () {
    return view('residensial');
})->name('residensial');

Route::get('/galeri', function () {
    return view('galeri');
})->name('galeri');

Route::get('/kontak', function () {
    return view('kontak');
})->name('kontak');