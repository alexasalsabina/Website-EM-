<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\StatistikDesa;
use Illuminate\Http\Request;

class DataDesaController extends Controller
{
    private function kategoriInfo(): array
    {
        return [
            'gender' => [
                'judul' => 'Jenis Kelamin',
                'default' => ['Laki-laki', 'Perempuan'],
            ],
            'usia' => [
                'judul' => 'Kelompok Usia',
                'default' => ['Balita (0-5 th)', 'Anak (6-12 th)', 'Remaja (13-25 th)', 'Dewasa (26-60 th)', 'Lansia (60+ th)'],
            ],
            'dusun' => [
                'judul' => 'Per Dusun',
                'default' => [],
            ],
            'status_perkawinan' => [
                'judul' => 'Status Perkawinan',
                'default' => ['Belum Kawin', 'Kawin', 'Cerai Hidup', 'Cerai Mati'],
            ],
            'pendidikan' => [
                'judul' => 'Pendidikan Terakhir',
                'default' => ['Tidak/Belum Sekolah', 'SD', 'SMP', 'SMA', 'D3', 'S1', 'S2/S3'],
            ],
            'pekerjaan' => [
                'judul' => 'Pekerjaan',
                'default' => [
                    'Belum Bekerja', 'Pelajar/Mahasiswa', 'PNS/ASN', 'TNI/Polri',
                    'Petani/Buruh Tani', 'Pedagang/Wiraswasta', 'Karyawan Swasta',
                    'Buruh Harian', 'Nelayan', 'Pensiunan', 'Ibu Rumah Tangga', 'Lainnya',
                ],
            ],
            'disabilitas' => [
                'judul' => 'Jenis Disabilitas',
                'default' => [
                    'Disabilitas Fisik', 'Disabilitas Netra', 'Disabilitas Rungu/Wicara',
                    'Disabilitas Mental', 'Disabilitas Fisik dan Mental', 'Lainnya',
                ],
            ],
        ];
    }

    public function index()
    {
        return view('admin.data-desa.index');
    }

    public function statistik()
    {
        $semua = StatistikDesa::all()->groupBy('kategori');

        $ambil = fn (string $kategori) => $semua->get($kategori, collect());

        $totalLakiLaki = (int) $ambil('gender')->firstWhere('label', 'Laki-laki')?->jumlah;
        $totalPerempuan = (int) $ambil('gender')->firstWhere('label', 'Perempuan')?->jumlah;
        $totalPenduduk = $totalLakiLaki + $totalPerempuan;

        $kelompokUsia = $ambil('usia')->pluck('jumlah', 'label');

        $perDusun = $ambil('dusun')->map(fn ($item) => (object) [
            'dusun' => $item->label,
            'jumlah' => $item->jumlah,
        ])->sortByDesc('jumlah')->values();

        $statusPerkawinan = $ambil('status_perkawinan')->map(fn ($item) => (object) [
            'status_perkawinan' => $item->label,
            'jumlah' => $item->jumlah,
        ])->values();

        $pendidikan = $ambil('pendidikan')->map(fn ($item) => (object) [
            'pendidikan_terakhir' => $item->label,
            'jumlah' => $item->jumlah,
        ])->values();

        $pekerjaan = $ambil('pekerjaan')->map(fn ($item) => (object) [
            'pekerjaan' => $item->label,
            'jumlah' => $item->jumlah,
        ])->sortByDesc('jumlah')->values();

        $totalDisabilitas = (int) $ambil('disabilitas')->sum('jumlah');

        $jenisDisabilitas = $ambil('disabilitas')->map(fn ($item) => (object) [
            'jenis_disabilitas' => $item->label,
            'jumlah' => $item->jumlah,
        ])->values();

        return view('admin.data-desa.statistik.index', compact(
            'totalPenduduk',
            'totalLakiLaki',
            'totalPerempuan',
            'kelompokUsia',
            'perDusun',
            'statusPerkawinan',
            'pendidikan',
            'pekerjaan',
            'totalDisabilitas',
            'jenisDisabilitas'
        ));
    }

    public function editStatistik(string $kategori)
    {
        $info = $this->kategoriInfo();

        abort_unless(array_key_exists($kategori, $info), 404);

        $tersimpan = StatistikDesa::where('kategori', $kategori)->orderBy('id')->get();

        if ($tersimpan->isEmpty() && !empty($info[$kategori]['default'])) {
            $items = collect($info[$kategori]['default'])->map(fn ($label) => (object) [
                'label' => $label,
                'jumlah' => 0,
            ]);
        } else {
            $items = $tersimpan->map(fn ($item) => (object) [
                'label' => $item->label,
                'jumlah' => $item->jumlah,
            ]);
        }

        return view('admin.data-desa.statistik.edit', [
            'kategori' => $kategori,
            'judulKategori' => $info[$kategori]['judul'],
            'items' => $items,
        ]);
    }

    public function updateStatistik(Request $request, string $kategori)
    {
        $info = $this->kategoriInfo();

        abort_unless(array_key_exists($kategori, $info), 404);

        $validated = $request->validate([
            'label' => 'required|array',
            'label.*' => 'nullable|string|max:255',
            'jumlah' => 'required|array',
            'jumlah.*' => 'nullable|integer|min:0',
        ]);

        StatistikDesa::where('kategori', $kategori)->delete();

        foreach ($validated['label'] as $index => $label) {
            $label = trim((string) $label);

            if ($label === '') {
                continue;
            }

            StatistikDesa::create([
                'kategori' => $kategori,
                'label' => $label,
                'jumlah' => (int) ($validated['jumlah'][$index] ?? 0),
            ]);
        }

        return redirect()
            ->route('admin.data-desa.statistik')
            ->with('success', "Statistik \"{$info[$kategori]['judul']}\" berhasil diperbarui.");
    }
}
