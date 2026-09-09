<?php

namespace App\Http\Controllers;

use App\Models\Sambutan;
use App\Models\ProfilKonten;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProfilDesaController extends Controller
{
    public function index()
    {
        return view('admin.profil.index');
    }

    /**
     * Form edit sambutan
     */
    public function sambutanEdit()
    {
        $sambutan = Sambutan::first();
        return view('admin.profil.sambutan.edit', compact('sambutan'));
    }

    /**
     * Simpan perubahan sambutan
     */
    public function sambutanUpdate(Request $request)
    {
        $request->validate([
            'nama_kepala_desa' => 'required|string|max:255',
            'isi_sambutan'     => 'required|string',
            'foto'             => 'nullable|image|mimes:jpg,jpeg,png|max:4096',
        ]);

        $sambutan = Sambutan::firstOrNew([]);

        $sambutan->nama_kepala_desa = $request->nama_kepala_desa;
        $sambutan->isi_sambutan = $request->isi_sambutan;

        if ($request->hasFile('foto')) {
            if ($sambutan->foto && Storage::disk('public')->exists($sambutan->foto)) {
                Storage::disk('public')->delete($sambutan->foto);
            }
            $sambutan->foto = $request->file('foto')->store('sambutan', 'public');
        }

        $sambutan->save();

        return redirect()->route('admin.profil.index')
            ->with('success', 'Sambutan Kepala Desa berhasil diperbarui.');
    }

    public function struktur()
    {
        return view('admin.profil.struktur.index');
    }

    public function potensi()
    {
        return view('profil.potensi', [
            'potensi' => ProfilKonten::where('kategori', 'potensi')->orderBy('urutan')->get(),
        ]);
    }

    public function kelembagaan()
    {
        return view('profil.kelembagaan', [
            'kelembagaan' => ProfilKonten::where('kategori', 'kelembagaan')->orderBy('urutan')->get(),
        ]);
    }

    public function inovasi()
    {
        return view('admin.profil.inovasi.index');
    }

    public function prestasi()
    {
        return view('admin.profil.prestasi.index');
    }
    public function potensiDetail($kategori)
{
    $detail = ProfilKonten::where('kategori', 'potensi')->where('slug', $kategori)->firstOrFail();

    return view('potensi-detail', compact('detail'));
}
}