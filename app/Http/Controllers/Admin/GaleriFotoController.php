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
            'tahun' => 'required|integer|min:1900|max:' . (date('Y') + 1),
            'foto' => 'required|array|min:1|max:3',
            'foto.*' => 'required|image|max:4096', // max 4MB per foto
        ]);

        foreach ($request->file('foto') as $foto) {
            $kategori->fotos()->create([
                'judul' => $kategori->nama,
                'tahun' => $request->tahun,
                'foto' => $foto->store('galeri', 'public'),
            ]);
        }

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
            'tahun' => 'required|integer|min:1900|max:' . (date('Y') + 1),
            'foto' => 'nullable|image|max:4096',
        ]);

        $data = $request->only('tahun');

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