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

Route::get('/profil/rangkup/bumdes', function () {
    return view('profil.bumdes');
})->name('profil.bumdes');

Route::get('/profil/rangkup/lembaga-desa', function () {
    return view('profil.lembaga-desa');
})->name('profil.lembaga-desa');

Route::get('/profil/rangkup/lembaga-desa/lpm', function () {
    return view('lembaga.lpm');
})->name('lembaga.lpm');

Route::get('/profil/rangkup/lembaga-desa/pkk', function () {
    return view('lembaga.pkk');
})->name('lembaga.pkk');

Route::get('/profil/rangkup/lembaga-desa/karang-taruna', function () {
    return view('lembaga.karang-taruna');
})->name('lembaga.karang-taruna');

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