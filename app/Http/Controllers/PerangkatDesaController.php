<?php

namespace App\Http\Controllers;

use App\Models\PerangkatDesa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PerangkatDesaController extends Controller
{
    public function index()
    {
        $perangkatDesas = PerangkatDesa::orderBy('urutan')->orderBy('nama')->get();

        return view('admin.profil.struktur.index', compact('perangkatDesas'));
    }

    public function publicIndex()
    {
        $perangkatDesas = PerangkatDesa::where('status', 'aktif')
            ->orderBy('urutan')
            ->orderBy('nama')
            ->get();

        return view('profil.struktur-desa', compact('perangkatDesas'));
    }

    public function create()
    {
        return view('admin.profil.struktur.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'jabatan' => 'required|string|max:255',
            'keterangan' => 'nullable|string|max:500',
            'status' => 'required|in:aktif,tidak_aktif',
            'urutan' => 'required|integer|min:1',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:4096',
        ]);

        $data = [
            'nama' => $validated['nama'],
            'jabatan' => $validated['jabatan'],
            'keterangan' => $validated['keterangan'] ?? null,
            'status' => $validated['status'],
            'urutan' => $validated['urutan'],
        ];

        if ($request->hasFile('foto')) {
            $data['foto'] = $request->file('foto')->store('struktur-perangkat', 'public');
        }

        PerangkatDesa::create($data);

        return redirect()->route('admin.profil.struktur.index')->with('success', 'Perangkat desa berhasil ditambahkan.');
    }

    public function edit(PerangkatDesa $struktur)
    {
        return view('admin.profil.struktur.edit', compact('struktur'));
    }

    public function update(Request $request, PerangkatDesa $struktur)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'jabatan' => 'required|string|max:255',
            'keterangan' => 'nullable|string|max:500',
            'status' => 'required|in:aktif,tidak_aktif',
            'urutan' => 'required|integer|min:1',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:4096',
        ]);

        $data = [
            'nama' => $validated['nama'],
            'jabatan' => $validated['jabatan'],
            'keterangan' => $validated['keterangan'] ?? null,
            'status' => $validated['status'],
            'urutan' => $validated['urutan'],
        ];

        if ($request->hasFile('foto')) {
            if ($struktur->foto && Storage::disk('public')->exists($struktur->foto)) {
                Storage::disk('public')->delete($struktur->foto);
            }

            $data['foto'] = $request->file('foto')->store('struktur-perangkat', 'public');
        }

        $struktur->update($data);

        return redirect()->route('admin.profil.struktur.index')->with('success', 'Perangkat desa berhasil diperbarui.');
    }

    public function destroy(PerangkatDesa $struktur)
    {
        if ($struktur->foto && Storage::disk('public')->exists($struktur->foto)) {
            Storage::disk('public')->delete($struktur->foto);
        }

        $struktur->delete();

        return redirect()->route('admin.profil.struktur.index')->with('success', 'Perangkat desa berhasil dihapus.');
    }
}
