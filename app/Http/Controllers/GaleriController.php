<?php

namespace App\Http\Controllers;

use App\Models\GaleriKategori;

class GaleriController extends Controller
{
    /**
     * Halaman galeri publik
     */
    public function index()
    {
        // Memuat relasi foto sekaligus menghitung jumlah foto
        $kategoris = GaleriKategori::with('fotos')
            ->withCount('fotos')
            ->get();

        return view('galeri.index', compact('kategoris'));
    }

    /**
     * Detail galeri berdasarkan kategori
     */
    public function show($slug)
    {
        // Memuat foto berdasarkan kategori
        $kategori = GaleriKategori::where('slug', $slug)
            ->with('fotos')
            ->firstOrFail();

        return view('galeri.show', compact('kategori'));
    }
}