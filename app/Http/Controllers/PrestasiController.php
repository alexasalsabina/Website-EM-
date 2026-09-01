<?php

namespace App\Http\Controllers;

use App\Models\Prestasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PrestasiController extends Controller
{
    public function index()
    {
        $prestasis = Prestasi::latest('tanggal')->get();

        return view('admin.profil.prestasi.index', compact('prestasis'));
    }

    public function create()
    {
        return view('admin.profil.prestasi.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'nama' => 'required|string|max:255',
            'tanggal' => 'required|date',
            'hari' => 'required|string|max:20',
            'keterangan' => 'required|string',
        ]);

        if ($request->hasFile('foto')) {
            $validated['foto'] = $request->file('foto')
                ->store('prestasi', 'public');
        }

        Prestasi::create($validated);

        return redirect()
            ->route('admin.profil.prestasi.index')
            ->with('success', 'Prestasi berhasil ditambahkan.');
    }

    public function edit(Prestasi $prestasi)
    {
        return view('admin.profil.prestasi.edit', compact('prestasi'));
    }

    public function update(Request $request, Prestasi $prestasi)
    {
        $validated = $request->validate([
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'nama' => 'required|string|max:255',
            'tanggal' => 'required|date',
            'hari' => 'required|string|max:20',
            'keterangan' => 'required|string',
        ]);

        if ($request->hasFile('foto')) {

            if ($prestasi->foto) {
                Storage::disk('public')->delete($prestasi->foto);
            }

            $validated['foto'] = $request->file('foto')
                ->store('prestasi', 'public');
        }

        $prestasi->update($validated);

        return redirect()
            ->route('admin.profil.prestasi.index')
            ->with('success', 'Prestasi berhasil diperbarui.');
    }

    public function destroy(Prestasi $prestasi)
    {
        if ($prestasi->foto) {
            Storage::disk('public')->delete($prestasi->foto);
        }

        $prestasi->delete();

        return redirect()
            ->route('admin.profil.prestasi.index')
            ->with('success', 'Prestasi berhasil dihapus.');
    }
}