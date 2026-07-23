<?php

use Illuminate\Support\Facades\Route;

Route::get('/', fn () => view('home'))->name('home');

Route::prefix('berita')->name('berita.')->group(function () {
    Route::get('/berita', fn () => view('berita.berita'))->name('berita');
    Route::get('/artikel', fn () => view('berita.artikel'))->name('artikel');
    Route::get('/opini', fn () => view('berita.opini'))->name('opini');
    Route::get('/agenda', fn () => view('berita.agenda'))->name('agenda');
});

Route::prefix('profil')->name('profil.')->group(function () {
    Route::get('/sejarah', fn () => view('profil.sejarah'))->name('sejarah');
    Route::get('/visi-misi', fn () => view('profil.visi-misi'))->name('visi-misi');
    
    // --- UTAMA: Halaman Pilihan Kelembagaan (3 Kartu) ---
    Route::get('/kelembagaan', fn () => view('profil.kelembagaan'))->name('kelembagaan');
    
    // --- SUB-HALAMAN DETAIL KELEMBAGAAN ---
    Route::get('/kelembagaan/karang-taruna', fn () => view('profil.kelembagaan.karangtaruna'))->name('kelembagaan.karangtaruna');
    Route::get('/kelembagaan/lpm', fn () => view('profil.kelembagaan.lpm'))->name('kelembagaan.lpm');
    Route::get('/kelembagaan/pkk', fn () => view('profil.kelembagaan.pkk'))->name('kelembagaan.pkk');

    Route::get('/monografi', fn () => view('profil.monografi'))->name('monografi');
    Route::get('/potensi', fn () => view('profil.potensi'))->name('potensi');
    Route::get('/inovasi', fn () => view('profil.inovasi'))->name('inovasi');
    Route::get('/prestasi', fn () => view('profil.prestasi'))->name('prestasi');
});

Route::prefix('data')->name('data.')->group(function () {
    Route::get('/anggaran', fn () => view('data.anggaran'))->name('anggaran');
    Route::get('/dana-desa', fn () => view('data.dana-desa'))->name('dana-desa');
    Route::get('/peraturan-desa', fn () => view('data.peraturan-desa'))->name('peraturan-desa');
    Route::get('/monografi', fn () => view('data.monografi'))->name('monografi');
    Route::get('/aset-desa', fn () => view('data.aset-desa'))->name('aset-desa');
    Route::get('/statistik-penduduk', fn () => view('data.statistik-penduduk'))->name('statistik-penduduk');
    Route::get('/integrasi-data-desa', fn () => view('data.integrasi-data-desa'))->name('integrasi-data-desa');
});

Route::prefix('event')->name('event.')->group(function () {
    Route::get('/karnaval-kemerdekaan', fn () => view('event.karnaval-kemerdekaan'))->name('karnaval-kemerdekaan');
    Route::get('/karnaval', fn () => view('event.karnaval'))->name('karnaval');
    Route::get('/hut-desa', fn () => view('event.hut-desa'))->name('hut-desa');
});

Route::get('/produk-hukum', fn () => view('produkhukum'))->name('produkhukum');
Route::get('/ppdi', fn () => view('ppdi'))->name('ppdi');
Route::get('/galeri', fn () => view('galeri'))->name('galeri');
Route::get('/kontak', fn () => view('kontak'))->name('kontak');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__.'/auth.php';