<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\GaleriKategori;
use App\Models\GaleriFoto;

class GaleriController extends Controller
{
    /**
     * Halaman utama Galeri Admin
     */
    public function index()
    {
        $kategoris = GaleriKategori::withCount('fotos')
            ->orderBy('nama')
            ->get();

        $totalKategori = GaleriKategori::count();
        $totalFoto = GaleriFoto::count();

        return view('admin.galeri.index', compact(
            'kategoris',
            'totalKategori',
            'totalFoto'
        ));
    }
}