<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\AgendaController;
use App\Http\Controllers\GaleriController;
use App\Http\Controllers\AspirasiController;
use App\Http\Controllers\DataDesaController;
use App\Http\Controllers\ProfilDesaController;

Route::get('/', fn () => view('home'))->name('home');

/*
|--------------------------------------------------------------------------
| Aspirasi Warga
|--------------------------------------------------------------------------
*/

Route::prefix('aspirasi')->name('aspirasi.')->group(function () {

    // Halaman form warga
    Route::get('/', [AspirasiController::class, 'index'])
        ->name('index');

    // Simpan aspirasi
    Route::post('/store', [AspirasiController::class, 'store'])
        ->name('store');

});


/*
|--------------------------------------------------------------------------
| Berita
|--------------------------------------------------------------------------
*/

Route::prefix('berita')->name('berita.')->group(function () {

    Route::get('/berita', fn () => view('berita.berita'))
        ->name('berita');

    Route::get('/artikel', fn () => view('berita.artikel'))
        ->name('artikel');

    Route::get('/opini', fn () => view('berita.opini'))
        ->name('opini');

    Route::get('/agenda', fn () => view('berita.agenda'))
        ->name('agenda');

});


/*
|--------------------------------------------------------------------------
| Profil
|--------------------------------------------------------------------------
*/

Route::prefix('profil')->name('profil.')->group(function () {

    Route::get('/sejarah', fn () => view('profil.sejarah'))
        ->name('sejarah');

    Route::get('/visi-misi', fn () => view('profil.visi-misi'))
        ->name('visi-misi');

    Route::get('/kelembagaan', fn () => view('profil.kelembagaan'))
        ->name('kelembagaan');

    Route::get('/monografi', fn () => view('profil.monografi'))
        ->name('monografi');

    Route::get('/potensi', fn () => view('profil.potensi'))
        ->name('potensi');

    Route::get('/inovasi', fn () => view('profil.inovasi'))
        ->name('inovasi');

    Route::get('/prestasi', fn () => view('profil.prestasi'))
        ->name('prestasi');

});


/*
|--------------------------------------------------------------------------
| Data Desa
|--------------------------------------------------------------------------
*/

Route::prefix('data')->name('data.')->group(function () {

    Route::get('/anggaran', fn () => view('data.anggaran'))
        ->name('anggaran');

    Route::get('/dana-desa', fn () => view('data.dana-desa'))
        ->name('dana-desa');

    Route::get('/peraturan-desa', fn () => view('data.peraturan-desa'))
        ->name('peraturan-desa');

    Route::get('/monografi', fn () => view('data.monografi'))
        ->name('monografi');

    Route::get('/aset-desa', fn () => view('data.aset-desa'))
        ->name('aset-desa');

    Route::get('/statistik-penduduk', fn () => view('data.statistik-penduduk'))
        ->name('statistik-penduduk');

    Route::get('/integrasi-data-desa', fn () => view('data.integrasi-data-desa'))
        ->name('integrasi-data-desa');

});


/*
|--------------------------------------------------------------------------
| Event
|--------------------------------------------------------------------------
*/

Route::prefix('event')->name('event.')->group(function () {

    Route::get('/karnaval-kemerdekaan', fn () => view('event.karnaval-kemerdekaan'))
        ->name('karnaval-kemerdekaan');

    Route::get('/karnaval', fn () => view('event.karnaval'))
        ->name('karnaval');

    Route::get('/hut-desa', fn () => view('event.hut-desa'))
        ->name('hut-desa');

});


Route::get('/produk-hukum', fn () => view('produkhukum'))
    ->name('produkhukum');

Route::get('/ppdi', fn () => view('ppdi'))
    ->name('ppdi');

Route::get('/galeri', fn () => view('galeri'))
    ->name('galeri');

Route::get('/kontak', fn () => view('kontak'))
    ->name('kontak');

/*
|--------------------------------------------------------------------------
| Admin Dashboard
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'verified'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {

        // Dashboard
        Route::get('/dashboard', [DashboardController::class, 'index'])
            ->name('dashboard');

        // Berita
        Route::resource('berita', BeritaController::class);

        // Agenda
        Route::resource('agenda', AgendaController::class);

        // Galeri
        Route::resource('galeri', GaleriController::class);

        // Profil Desa
        Route::resource('profil', ProfilDesaController::class);

        // Data Desa
        Route::resource('data-desa', DataDesaController::class);

        // Aspirasi
        Route::get('/aspirasi', [AspirasiController::class, 'admin'])
            ->name('aspirasi.index');
    });
    
require __DIR__.'/auth.php';