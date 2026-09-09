<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\GaleriKategori;

class GaleriController extends Controller
{
    /**
     * Halaman utama Galeri Admin
     */
    public function index()
    {
        $kategoris = GaleriKategori::withCount('fotos')
            ->whereRaw('LOWER(nama) != ?', ['coba lagi'])
            ->orderBy('nama')
            ->get();

        return view('admin.galeri.index', compact('kategoris'));
    }
}