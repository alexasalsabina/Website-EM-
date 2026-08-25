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
<<<<<<< HEAD
        $kategoris = GaleriKategori::withCount('fotos')->get();
=======
        // Diubah dari 'foto' menjadi 'fotos'
        $kategoris = GaleriKategori::with('fotos')
            ->withCount('fotos')
            ->get();
>>>>>>> 9187e30ca5d32e25153e8d7d4978ad72fb7f1811

        return view('galeri.index', compact('kategoris'));
    }

    /**
     * Detail galeri berdasarkan kategori
     */
    public function show($slug)
    {
        // Diubah dari 'foto' menjadi 'fotos'
        $kategori = GaleriKategori::where('slug', $slug)
            ->with('fotos')
            ->firstOrFail();

        return view('galeri.show', compact('kategori'));
    }
}