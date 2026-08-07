<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\GaleriKategori;
use Illuminate\Http\Request;

class GaleriKategoriController extends Controller
{
    public function index()
    {
        $kategoris = GaleriKategori::withCount('fotos')->orderBy('nama')->get();
        return view('admin.galeri.index', compact('kategoris'));
    }

    public function create()
    {
        return view('admin.galeri.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255|unique:galeri_kategoris,nama',
        ]);

        GaleriKategori::create($request->only('nama'));

        return redirect()->route('admin.galeri-kategori.index')
            ->with('success', 'Kategori berhasil ditambahkan.');
    }

    public function edit(GaleriKategori $galeriKategori)
    {
        return view('admin.galeri.edit', ['kategori' => $galeriKategori]);
    }

    public function update(Request $request, GaleriKategori $galeriKategori)
    {
        $request->validate([
            'nama' => 'required|string|max:255|unique:galeri_kategoris,nama,' . $galeriKategori->id,
        ]);

        $galeriKategori->update($request->only('nama'));

        return redirect()->route('admin.galeri-kategori.index')
            ->with('success', 'Kategori berhasil diperbarui.');
    }

    public function destroy(GaleriKategori $galeriKategori)
    {
        $galeriKategori->delete(); // otomatis hapus foto2nya krn cascade
        return back()->with('success', 'Kategori berhasil dihapus.');
    }
}