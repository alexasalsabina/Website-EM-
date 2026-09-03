<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\GaleriController; // <-- Galeri publik
use App\Http\Controllers\Admin\GaleriController as AdminGaleriController;
use App\Http\Controllers\Admin\GaleriKategoriController;
use App\Http\Controllers\Admin\GaleriFotoController;
use App\Http\Controllers\DataDesaController;
use App\Http\Controllers\ProfilDesaController;
use App\Http\Controllers\PrestasiController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\PotensiController;
use App\Http\Controllers\Admin\EventController as AdminEventController;

Route::get('/', fn () => view('home'))->name('home');

/*
|--------------------------------------------------------------------------
| Berita
|--------------------------------------------------------------------------
*/

Route::prefix('berita')->name('berita.')->group(function () {

    Route::get('/berita', [BeritaController::class, 'publicIndex'])->name('berita');
    Route::get('/artikel', [BeritaController::class, 'publicArtikel'])->name('artikel');
    Route::get('/opini', [BeritaController::class, 'publicOpini'])->name('opini');
    
});

/*
|--------------------------------------------------------------------------
| Profil
|--------------------------------------------------------------------------
*/

Route::prefix('profil')->name('profil.')->group(function () {

    Route::get('/sejarah', fn () => view('profil.sejarah'))->name('sejarah');
    Route::get('/visi-misi', fn () => view('profil.visi-misi'))->name('visi-misi');
    Route::get('/kelembagaan', fn () => view('profil.kelembagaan'))->name('kelembagaan');

    Route::prefix('kelembagaan')->name('kelembagaan.')->group(function () {
        Route::get('/karang-taruna', fn () => view('profil.kelembagaan.karang-taruna'))->name('karangtaruna');
        Route::get('/lpm', fn () => view('profil.kelembagaan.lpm'))->name('lpm');
        Route::get('/pkk', fn () => view('profil.kelembagaan.pkk'))->name('pkk');
    });

   
    Route::get('/monografi', fn () => view('profil.monografi'))->name('monografi');
    Route::get('/potensi', fn () => view('profil.potensi'))->name('potensi');
    Route::get('/struktur-desa', [PerangkatDesaController::class, 'publicIndex'])->name('struktur-desa');

    // Route Detail Potensi
    Route::get('/inovasi', fn () => view('profil.inovasi'))->name('inovasi');
    Route::get('/prestasi', fn () => view('profil.prestasi'))->name('prestasi');

    // Tokoh-tokoh desa
    Route::get('/tokoh', fn () => view('profil.tokoh'))
        ->name('tokoh');

});

Route::get('/profil/potensi/{kategori}', [ProfilDesaController::class, 'potensiDetail'])->name('potensi.detail');

/*
|--------------------------------------------------------------------------
| Data Desa
|--------------------------------------------------------------------------
*/

Route::prefix('data')->name('data.')->group(function () {

    Route::get('/anggaran', fn () => view('data.anggaran'))->name('anggaran');

    Route::get('/dana-desa', fn () => view('data.dana-desa'))->name('dana-desa');

    Route::get('/peraturan-desa', fn () => view('data.peraturan-desa'))->name('peraturan-desa');

    Route::get('/monografi', fn () => view('data.monografi'))->name('monografi');

    Route::get('/aset-desa', fn () => view('data.aset-desa'))->name('aset-desa');

    Route::get('/statistik-penduduk', fn () => view('data.statistik-penduduk'))->name('statistik-penduduk');

    Route::get('/statistik-penduduk/{kategori}', function (string $kategori) {
        $categories = [
            'demografi' => [
                'title' => 'Demografi Penduduk',
                'items' => ['Kelompok Usia', 'Jumlah Kepala Keluarga (KK)'],
            ],
            'sosial-pendidikan' => [
                'title' => 'Status Sosial & Pendidikan',
                'items' => ['Tingkat Pendidikan', 'Status Perkawinan'],
            ],
            'ekonomi' => [
                'title' => 'Pekerjaan / Mata Pencaharian',
                'items' => ['Mata Pencaharian'],
                'direct' => true,
                'directLabel' => 'Mata Pencaharian',
            ],
            'inklusi' => [
                'title' => 'Penyandang Disabilitas',
                'items' => ['Penyandang Disabilitas'],
                'direct' => true,
                'directLabel' => 'Penyandang Disabilitas',
            ],
        ];

        abort_unless(isset($categories[$kategori]), 404);

        return view('data.statistik-penduduk-pilihan', [
            'category' => $categories[$kategori],
            'kategori' => $kategori,
        ]);
    })->name('statistik-penduduk.kategori');

    Route::get('/statistik-penduduk/{kategori}/{submenu}', function (string $kategori, string $submenu) {
        $titles = [
            'demografi' => 'Demografi Penduduk',
            'sosial-pendidikan' => 'Status Sosial & Pendidikan',
            'ekonomi' => 'Pekerjaan / Mata Pencaharian',
            'inklusi' => 'Penyandang Disabilitas',
        ];

        $submenuTitles = [
            'kelompok-usia' => 'Kelompok Usia',
            'jumlah-kepala-keluarga-kk' => 'Jumlah Kepala Keluarga (KK)',
            'tingkat-pendidikan' => 'Tingkat Pendidikan',
            'status-perkawinan' => 'Status Perkawinan',
            'mata-pencaharian' => 'Mata Pencaharian',
            'penyandang-disabilitas' => 'Penyandang Disabilitas',
            'golongan-darah' => 'Golongan Darah',
        ];

        abort_unless(isset($titles[$kategori]), 404);

        return view('data.statistik-penduduk-data', [
            'categoryTitle' => $titles[$kategori],
            'submenuTitle' => $submenuTitles[$submenu] ?? ucwords(str_replace('-', ' ', $submenu)),
            'kategori' => $kategori,
        ]);
    })->name('statistik-penduduk.submenu');

    Route::get('/integrasi-data-desa', fn () => view('data.integrasi-data-desa'))->name('integrasi-data-desa');

});

/*
|--------------------------------------------------------------------------
| Event
|--------------------------------------------------------------------------
*/

Route::prefix('event')->name('event.')->group(function () {
    Route::get('/', [EventController::class, 'index'])->name('index');
    Route::get('/{slug}', [EventController::class, 'show'])->name('show');
});

Route::get('/produk-hukum', fn () => view('produkhukum'))->name('produkhukum');

Route::get('/ppdi', fn () => view('ppdi'))->name('ppdi');

/*
|--------------------------------------------------------------------------
| Galeri Publik
|--------------------------------------------------------------------------
*/

Route::get('/galeri', [GaleriController::class, 'index'])->name('galeri.index');

Route::get('/galeri/{slug}', [GaleriController::class, 'show'])->name('galeri.show');

Route::get('/kontak', fn () => view('kontak'))->name('kontak');

/*
|--------------------------------------------------------------------------
| Admin
|--------------------------------------------------------------------------
*/

Route::middleware('auth')
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {

        Route::get('/dashboard', [DashboardController::class, 'index'])
            ->name('dashboard');

        Route::resource('berita', BeritaController::class);


        Route::resource('event', AdminEventController::class)->except(['show']);

        /*
        |----------------------------------------------------------
        | GALERI
        |----------------------------------------------------------
        */

        // Halaman utama Galeri Admin
        Route::get('/galeri', [AdminGaleriController::class, 'index'])
            ->name('galeri.index');

        // CRUD Kategori Galeri
        Route::resource('galeri-kategori', GaleriKategoriController::class)
            ->except(['show']);

        Route::prefix('galeri-kategori/{kategori}/foto')
            ->name('galeri-foto.')
            ->group(function () {

                Route::get('/', [GaleriFotoController::class, 'index'])->name('index');

                Route::get('/create', [GaleriFotoController::class, 'create'])->name('create');

                Route::post('/', [GaleriFotoController::class, 'store'])->name('store');

                Route::get('/{foto}/edit', [GaleriFotoController::class, 'edit'])->name('edit');

                Route::put('/{foto}', [GaleriFotoController::class, 'update'])->name('update');

                Route::delete('/{foto}', [GaleriFotoController::class, 'destroy'])->name('destroy');

            });

        /*
        |--------------------------------------------------------------------------
        | PROFIL DESA
        |--------------------------------------------------------------------------
        */

        Route::prefix('profil')
            ->name('profil.')
            ->group(function () {

                Route::get('/', [ProfilDesaController::class,'index'])
                    ->name('index');

                Route::get('/sambutan/edit', [ProfilDesaController::class, 'sambutanEdit'])
                    ->name('sambutan.edit');

                Route::put('/sambutan', [ProfilDesaController::class, 'sambutanUpdate'])
                    ->name('sambutan.update');

                Route::resource('struktur', \App\Http\Controllers\PerangkatDesaController::class)
                    ->names('struktur')
                    ->except(['show']);

                Route::get('/potensi', [ProfilDesaController::class, 'potensi'])
                    ->name('potensi');

                Route::resource('inovasi', \App\Http\Controllers\InovasiDesaController::class)
                    ->names('inovasi')
                    ->except(['show']);

                Route::resource('prestasi', \App\Http\Controllers\PrestasiController::class)
                    ->names('prestasi')
                    ->except(['show']);
            });

        Route::prefix('data-desa')
            ->name('data-desa.')
            ->group(function () {

                Route::get('/', [\App\Http\Controllers\Admin\DataDesaController::class, 'index'])
                    ->name('index');

                Route::get('/statistik', [\App\Http\Controllers\Admin\DataDesaController::class, 'statistik'])
                    ->name('statistik');

                Route::get('/statistik/{kategori}', [\App\Http\Controllers\Admin\DataDesaController::class, 'editStatistik'])
                    ->name('statistik.edit'); 
                
                Route::put('/statistik/{kategori}', [\App\Http\Controllers\Admin\DataDesaController::class, 'updateStatistik'])
                    ->name('statistik.update');
            });
    });

require __DIR__.'/auth.php';