<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProfilKonten;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProfilKontenController extends Controller
{
    public function index(string $kategori)
    {
        $this->checkCategory($kategori);
        $konten = ProfilKonten::where('kategori', $kategori)->orderBy('urutan')->latest('id')->get();

        return view('admin.profil.konten.index', compact('konten', 'kategori'));
    }

    public function create(string $kategori)
    {
        $this->checkCategory($kategori);
        $this->checkLimit($kategori);

        return view('admin.profil.konten.create', compact('kategori'));
    }

    public function store(Request $request, string $kategori)
    {
        $this->checkCategory($kategori);
        $this->checkLimit($kategori);
        $data = $this->validated($request);
        $data['kategori'] = $kategori;
        $data['urutan'] = ProfilKonten::where('kategori', $kategori)->max('urutan') + 1;
        $data['foto'] = $request->file('foto')?->store('profil/' . $kategori, 'public');
        ProfilKonten::create($data);

        return redirect()->route('admin.profil.konten.index', $kategori)->with('success', 'Data berhasil ditambahkan.');
    }

    public function edit(string $kategori, ProfilKonten $konten)
    {
        $this->checkOwnership($kategori, $konten);
        return view('admin.profil.konten.edit', compact('konten', 'kategori'));
    }

    public function update(Request $request, string $kategori, ProfilKonten $konten)
    {
        $this->checkOwnership($kategori, $konten);
        $data = $this->validated($request);
        if ($request->hasFile('foto')) {
            Storage::disk('public')->delete($konten->foto);
            $data['foto'] = $request->file('foto')->store('profil/' . $kategori, 'public');
        }
        $konten->update($data);

        return redirect()->route('admin.profil.konten.index', $kategori)->with('success', 'Data berhasil diperbarui.');
    }

    public function destroy(string $kategori, ProfilKonten $konten)
    {
        $this->checkOwnership($kategori, $konten);
        Storage::disk('public')->delete($konten->foto);
        $konten->delete();

        return back()->with('success', 'Data berhasil dihapus.');
    }

    private function validated(Request $request): array
    {
        return $request->validate([
            'judul' => 'required|string|max:255',
            'isi' => 'required|string',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:4096',
        ]);
    }

    private function checkCategory(string $kategori): void
    {
        abort_unless(in_array($kategori, ['potensi', 'kelembagaan'], true), 404);
    }

    private function checkLimit(string $kategori): void
    {
        if ($kategori === 'kelembagaan') {
            abort_if(ProfilKonten::where('kategori', $kategori)->count() >= 3, 403, 'Maksimal 3 data telah tercapai.');
        }
    }

    private function checkOwnership(string $kategori, ProfilKonten $konten): void
    {
        abort_unless($konten->kategori === $kategori, 404);
    }
}
