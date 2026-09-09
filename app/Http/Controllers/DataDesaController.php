<?php

namespace App\Http\Controllers;

use App\Models\StatistikDesa;
use Illuminate\Support\Str;

class DataDesaController extends Controller
{
    /**
     * Peta kategori halaman ke daftar submenu-nya.
     * "direct" => true berarti kategori ini cuma 1 submenu, langsung tampil datanya
     * tanpa halaman pilihan.
     */
    protected array $categories = [
        'demografi' => [
            'title' => 'Demografi Penduduk',
            'items' => ['Kelompok Usia', 'Per Dusun'],
            'description' => 'Data kelompok usia dan persebaran penduduk menurut dusun.',
            'icon' => '&#128101;',
        ],
        'sosial-pendidikan' => [
            'title' => 'Status Sosial & Pendidikan',
            'items' => ['Tingkat Pendidikan', 'Status Perkawinan'],
            'description' => 'Data pendidikan terakhir dan status perkawinan penduduk.',
            'icon' => '&#127891;',
        ],
        'ekonomi' => [
            'title' => 'Pekerjaan / Mata Pencaharian',
            'items' => ['Pekerjaan'],
            'direct' => true,
            'directLabel' => 'Pekerjaan',
            'description' => 'Data jenis pekerjaan dan mata pencaharian penduduk.',
            'icon' => '&#128188;',
        ],
        'inklusi' => [
            'title' => 'Penyandang Disabilitas',
            'items' => ['Jenis Disabilitas'],
            'direct' => true,
            'directLabel' => 'Jenis Disabilitas',
            'description' => 'Data jenis disabilitas penduduk desa.',
            'icon' => '&#9855;',
        ],
    ];

    protected array $categoryTitles = [
        'demografi' => 'Demografi Penduduk',
        'sosial-pendidikan' => 'Status Sosial & Pendidikan',
        'ekonomi' => 'Pekerjaan / Mata Pencaharian',
        'inklusi' => 'Penyandang Disabilitas',
    ];

    /**
     * Peta slug submenu (di URL) ke kategori asli di tabel statistik_desas
     * — HARUS sama persis dengan kategoriInfo() di Admin\DataDesaController.
     */
    protected array $submenuMap = [
        'kelompok-usia' => [
            'title' => 'Kelompok Usia',
            'kategori_db' => 'usia',
        ],
        'per-dusun' => [
            'title' => 'Per Dusun',
            'kategori_db' => 'dusun',
        ],
        'tingkat-pendidikan' => [
            'title' => 'Tingkat Pendidikan',
            'kategori_db' => 'pendidikan',
        ],
        'status-perkawinan' => [
            'title' => 'Status Perkawinan',
            'kategori_db' => 'status_perkawinan',
        ],
        'pekerjaan' => [
            'title' => 'Pekerjaan',
            'kategori_db' => 'pekerjaan',
        ],
        'jenis-disabilitas' => [
            'title' => 'Jenis Disabilitas',
            'kategori_db' => 'disabilitas',
        ],
    ];

    /**
     * Halaman utama statistik penduduk (kartu ringkasan + menu kategori).
     */
    public function statistikPenduduk()
    {
        $totalLakiLaki  = (int) (StatistikDesa::where('kategori', 'gender')->where('label', 'Laki-laki')->value('jumlah') ?? 0);
        $totalPerempuan = (int) (StatistikDesa::where('kategori', 'gender')->where('label', 'Perempuan')->value('jumlah') ?? 0);
        $totalPenduduk  = $totalLakiLaki + $totalPerempuan;

        return view('data.statistik-penduduk', compact(
            'totalPenduduk', 'totalLakiLaki', 'totalPerempuan'
        ))->with('categories', $this->categories);
    }

    /**
     * Halaman pilihan sub-kategori. Kalau "direct", langsung redirect ke data submenu-nya.
     */
    public function statistikPendudukKategori(string $kategori)
    {
        abort_unless(isset($this->categories[$kategori]), 404);

        $category = $this->categories[$kategori];

        if (!empty($category['direct'])) {
            $slug = Str::slug($category['directLabel']);
            return redirect()->route('data.statistik-penduduk.submenu', [
                'kategori' => $kategori,
                'submenu' => $slug,
            ]);
        }

        return view('data.statistik-penduduk-pilihan', [
            'category' => $category,
            'kategori' => $kategori,
        ]);
    }

    /**
     * Halaman tabel data final untuk 1 submenu, diambil dari StatistikDesa.
     */
    public function statistikPendudukSubmenu(string $kategori, string $submenu)
    {
        abort_unless(isset($this->categoryTitles[$kategori]), 404);
        abort_unless(isset($this->submenuMap[$submenu]), 404);

        $submenuInfo = $this->submenuMap[$submenu];

        $rows = StatistikDesa::where('kategori', $submenuInfo['kategori_db'])
            ->orderBy('id')
            ->get();

        return view('data.statistik-penduduk-data', [
            'categoryTitle' => $this->categoryTitles[$kategori],
            'submenuTitle' => $submenuInfo['title'],
            'kategori' => $kategori,
            'rows' => $rows,
        ]);
    }
}