<?php

namespace App\Http\Controllers;

use App\Models\InovasiDesa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class InovasiDesaController extends Controller
{
    public function index()
    {
        $inovasis = InovasiDesa::orderBy('urutan')->orderBy('judul')->get();

        return view('admin.profil.inovasi.index', compact('inovasis'));
    }

    public function create()
    {
        return view('admin.profil.inovasi.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'status' => 'required|in:aktif,tidak_aktif',
            'urutan' => 'required|integer|min:1',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png|max:4096',
        ]);

        $data = [
            'judul' => $validated['judul'],
            'deskripsi' => $validated['deskripsi'],
            'status' => $validated['status'],
            'urutan' => $validated['urutan'],
        ];

        if ($request->hasFile('gambar')) {
            $data['gambar'] = $request->file('gambar')->store('inovasi-desa', 'public');
        }

        InovasiDesa::create($data);

        return redirect()->route('admin.profil.inovasi.index')->with('success', 'Data inovasi berhasil ditambahkan.');
    }

    public function edit(InovasiDesa $inovasi)
    {
        return view('admin.profil.inovasi.edit', compact('inovasi'));
    }

    public function update(Request $request, InovasiDesa $inovasi)
    {
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'status' => 'required|in:aktif,tidak_aktif',
            'urutan' => 'required|integer|min:1',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png|max:4096',
        ]);

        $data = [
            'judul' => $validated['judul'],
            'deskripsi' => $validated['deskripsi'],
            'status' => $validated['status'],
            'urutan' => $validated['urutan'],
        ];

        if ($request->hasFile('gambar')) {
            if ($inovasi->gambar && Storage::disk('public')->exists($inovasi->gambar)) {
                Storage::disk('public')->delete($inovasi->gambar);
            }

            $data['gambar'] = $request->file('gambar')->store('inovasi-desa', 'public');
        }

        $inovasi->update($data);

        return redirect()->route('admin.profil.inovasi.index')->with('success', 'Data inovasi berhasil diperbarui.');
    }

    public function destroy(InovasiDesa $inovasi)
    {
        if ($inovasi->gambar && Storage::disk('public')->exists($inovasi->gambar)) {
            Storage::disk('public')->delete($inovasi->gambar);
        }

        $inovasi->delete();

        return redirect()->route('admin.profil.inovasi.index')->with('success', 'Data inovasi berhasil dihapus.');
    }
}
