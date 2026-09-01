<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\StatistikDesa;
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
            'event' => [
                'total' => $this->safeCount(\App\Models\Event::class),  
                'label' => 'event tersedia',
            ],
            'galeri' => [
                'kategori' => $this->safeCount(GaleriKategori::class),
                'foto'     => $this->safeCount(GaleriFoto::class),
                'label'    => 'foto & video',
            ],
            'data_desa' => [
                'total' => $this->safeCount(StatistikDesa::class),
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
            \Log::error('Error in safeCount: ' . $e->getMessage());
            return 0;
        }
    }
}