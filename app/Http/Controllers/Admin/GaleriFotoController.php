<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\GaleriFoto;
use App\Models\GaleriKategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GaleriFotoController extends Controller
{
    public function index(GaleriKategori $kategori)
    {
        $fotos = $kategori->fotos; // sudah urut by tahun desc
        return view('admin.galeri.foto.index', compact('kategori', 'fotos'));
    }

    public function create(GaleriKategori $kategori)
    {
        return view('admin.galeri.foto.create', compact('kategori'));
    }

    public function store(Request $request, GaleriKategori $kategori)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'tahun' => 'required|integer|min:1900|max:' . (date('Y') + 1),
            'keterangan' => 'nullable|string',
            'foto' => 'required|image|max:4096', // max 4MB
        ]);

        $path = $request->file('foto')->store('galeri', 'public');

        $kategori->fotos()->create([
            'judul' => $request->judul,
            'tahun' => $request->tahun,
            'keterangan' => $request->keterangan,
            'foto' => $path,
        ]);

        return redirect()->route('admin.galeri-foto.index', $kategori)
            ->with('success', 'Foto berhasil ditambahkan.');
    }

    public function edit(GaleriKategori $kategori, GaleriFoto $foto)
    {
        return view('admin.galeri.foto.edit', compact('kategori', 'foto'));
    }

    public function update(Request $request, GaleriKategori $kategori, GaleriFoto $foto)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'tahun' => 'required|integer|min:1900|max:' . (date('Y') + 1),
            'keterangan' => 'nullable|string',
            'foto' => 'nullable|image|max:4096',
        ]);

        $data = $request->only('judul', 'tahun', 'keterangan');

        if ($request->hasFile('foto')) {
            if ($foto->foto) {
                Storage::disk('public')->delete($foto->foto);
            }
            $data['foto'] = $request->file('foto')->store('galeri', 'public');
        }

        $foto->update($data);

        return redirect()->route('admin.galeri-foto.index', $kategori)
            ->with('success', 'Foto berhasil diperbarui.');
    }

    public function destroy(GaleriKategori $kategori, GaleriFoto $foto)
    {
        if ($foto->foto) {
            Storage::disk('public')->delete($foto->foto);
        }
        $foto->delete();

        return back()->with('success', 'Foto berhasil dihapus.');
    }
}