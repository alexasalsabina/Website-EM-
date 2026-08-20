<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\AgendaController;
use App\Http\Controllers\GaleriController; // <-- Galeri publik
use App\Http\Controllers\Admin\GaleriController as AdminGaleriController;
use App\Http\Controllers\Admin\GaleriKategoriController;
use App\Http\Controllers\Admin\GaleriFotoController;
use App\Http\Controllers\DataDesaController;
use App\Http\Controllers\ProfilDesaController;

Route::get('/', fn () => view('home'))->name('home');

/*
|--------------------------------------------------------------------------
| Berita
|--------------------------------------------------------------------------
*/

Route::prefix('berita')->name('berita.')->group(function () {

    Route::get('/berita', fn () => view('berita.berita'))->name('berita');

    Route::get('/artikel', fn () => view('berita.artikel'))->name('artikel');

    Route::get('/opini', fn () => view('berita.opini'))->name('opini');

    Route::get('/agenda', [AgendaController::class, 'publicIndex'])->name('agenda');

    Route::get('/agenda/{slug}', [AgendaController::class, 'show'])->name('agenda.show');

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

    Route::get('/monografi', fn () => view('profil.monografi'))->name('monografi'); // <-- Route ditambahkan di sini

    Route::get('/potensi', fn () => view('profil.potensi'))->name('potensi');

    Route::get('/inovasi', fn () => view('profil.inovasi'))->name('inovasi');

    Route::get('/prestasi', fn () => view('profil.prestasi'))->name('prestasi');

    // Tokoh-tokoh desa
    Route::get('/tokoh', fn () => view('profil.tokoh'))
        ->name('tokoh');

});

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

    Route::get('/karnaval-kemerdekaan', fn () => view('event.karnaval-kemerdekaan'))->name('karnaval-kemerdekaan');

    Route::get('/karnaval', fn () => view('event.karnaval'))->name('karnaval');

    Route::get('/hut-desa', fn () => view('event.hut-desa'))->name('hut-desa');

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

        Route::resource('agenda', AgendaController::class);

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

                Route::get('/sambutan', [ProfilDesaController::class, 'sambutan'])
                    ->name('sambutan');

                Route::get('/struktur', [ProfilDesaController::class, 'struktur'])
                    ->name('struktur');

                Route::get('/potensi', [ProfilDesaController::class, 'potensi'])
                    ->name('potensi');

                Route::get('/inovasi', [ProfilDesaController::class, 'inovasi'])
                    ->name('inovasi');

                Route::get('/prestasi', [ProfilDesaController::class, 'prestasi'])
                    ->name('prestasi');
            });

        Route::prefix('data-desa')
            ->name('data-desa.')
            ->group(function () {

            Route::get('/', [DataDesaController::class, 'index'])->name('index');

            Route::get('/anggaran', [DataDesaController::class, 'anggaran'])->name('anggaran');

            Route::get('/dana-desa', [DataDesaController::class, 'danaDesa'])->name('dana');

            Route::get('/peraturan', [DataDesaController::class, 'peraturan'])->name('peraturan');

            Route::get('/monografi', [DataDesaController::class, 'monografi'])->name('monografi');

            Route::get('/aset', [DataDesaController::class, 'aset'])->name('aset');

            Route::get('/statistik', [DataDesaController::class, 'statistik'])->name('statistik');

            Route::get('/integrasi', [DataDesaController::class, 'integrasi'])->name('integrasi');
        });
        
    });

require __DIR__.'/auth.php';