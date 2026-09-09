<?php

namespace App\Http\Controllers;

use App\Models\GaleriKategori;
use App\Models\Event;

class GaleriController extends Controller
{
    /**
     * Halaman galeri publik
     */
    public function index()
    {
        $kategoris = GaleriKategori::with('fotos')
            ->withCount('fotos')
            ->get();
        $events = Event::where('status', 'publish')
            ->with('fotos')
            ->latest('tanggal')
            ->get();

        return view('galeri.index', compact('kategoris', 'events'));
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

    public function eventShow(string $slug)
    {
        $kategori = Event::where('slug', $slug)
            ->where('status', 'publish')
            ->with('fotos')
            ->firstOrFail();

        return view('galeri.show', compact('kategori'));
    }
}