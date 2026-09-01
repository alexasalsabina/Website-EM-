<?php

namespace App\Http\Controllers;

use App\Models\Sambutan;
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

        return redirect()->route('admin.profil.sambutan.edit')
            ->with('success', 'Sambutan Kepala Desa berhasil diperbarui.');
    }

    public function struktur()
    {
        return view('admin.profil.struktur.index');
    }

    public function potensi()
    {
        return view('admin.profil.potensi.index');
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
    $dataPotensi = [
        'pertanian' => [
            'judul' => 'Pertanian dan Hortikultura',
            'deskripsi' => 'Lahan subur di Jatisari mendukung tanaman pangan dan sayuran lokal, serta komoditas unggulan masyarakat.',
            'gambar' => 'images/pertanian.jpg'
        ],
        'wisata' => [
            'judul' => 'Wisata Alam & Budaya',
            'deskripsi' => 'Lingkungan asri, tradisi lokal, dan ruang publik desa memberi peluang wisata alam serta event kebudayaan.',
            'gambar' => 'images/wisata.jpg'
        ],
        'umkm' => [
            'judul' => 'UMKM Kreatif',
            'deskripsi' => 'Usaha mikro dan kerajinan lokal terus berkembang dengan dukungan pelatihan dan pemasaran digital.',
            'gambar' => 'images/umkm.jpg'
        ],
        'pendidikan' => [
            'judul' => 'Pendidikan & Keterampilan',
            'deskripsi' => 'Pusat belajar desa dan kegiatan literasi memperkuat talent lokal serta menyiapkan generasi muda.',
            'gambar' => 'images/pendidikan.jpg'
        ],
    ];

    if (!array_key_exists($kategori, $dataPotensi)) {
        abort(404);
    }

    $detail = $dataPotensi[$kategori];

    return view('potensi-detail', compact('detail'));
}
}