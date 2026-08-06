<?php

namespace App\Http\Controllers;

use App\Models\Agenda;
use App\Models\Aspirasi;
use App\Models\Berita;
use App\Models\DataDesa;
use App\Models\GaleriFoto;
use App\Models\GaleriKategori;
use Illuminate\Support\Facades\Schema;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'berita' => [
                'total'   => $this->safeCount(Berita::class),
                'label'   => 'berita dipublikasikan',
            ],
            'aspirasi' => [
                'total'   => $this->safeCount(Aspirasi::class),
                'baru'    => $this->safeCount(Aspirasi::class, function ($query) {
                    // Sesuaikan nama kolom status jika berbeda di tabel kamu
                    if (Schema::hasColumn('aspirasis', 'status')) {
                        $query->where('status', 'baru');
                    } elseif (Schema::hasColumn('aspirasis', 'dibaca')) {
                        $query->where('dibaca', false);
                    }
                }),
                'label'   => 'aspirasi masuk',
            ],
            'agenda' => [
                'total'      => $this->safeCount(Agenda::class),
                'mendatang'  => $this->safeCount(Agenda::class, function ($query) {
                    if (Schema::hasColumn('agenda', 'tanggal')) {
                        $query->whereDate('tanggal', '>=', now()->toDateString());
                    } elseif (Schema::hasColumn('agendas', 'tanggal')) {
                        $query->whereDate('tanggal', '>=', now()->toDateString());
                    }
                }),
                'label'      => 'agenda terjadwal',
            ],
            'galeri' => [
                'kategori' => $this->safeCount(GaleriKategori::class),
                'foto'     => $this->safeCount(GaleriFoto::class),
                'label'    => 'foto & video',
            ],
            'data_desa' => [
                'total' => $this->safeCount(DataDesa::class),
                'label' => 'entri data desa',
            ],
        ];

        return view('admin.dashboard', compact('stats'));
    }

    /**
     * Hitung jumlah baris dengan aman.
     * Kalau model/tabel belum ada atau ada error lain, kembalikan 0
     * supaya dashboard tetap tampil tanpa error.
     */
    private function safeCount(string $modelClass, ?callable $callback = null): int
    {
        try {
            $query = $modelClass::query();

            if ($callback) {
                $callback($query);
            }

            return $query->count();
        } catch (\Throwable $e) {
            return 0;
        }
    }
}