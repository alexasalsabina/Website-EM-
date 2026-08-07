<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class BeritaController extends Controller
{
    /**
     * ============================================
     * HALAMAN WARGA
     * ============================================
     */

    public function publicIndex()
    {
        $beritas = Berita::where('status', 'publish')
            ->latest()
            ->paginate(6);

        return view('berita.berita', compact('beritas'));
    }

    public function publicShow($slug)
    {
        $berita = Berita::where('slug', $slug)
            ->where('status', 'publish')
            ->firstOrFail();

        return view('berita.detail', compact('berita'));
    }

    /**
     * ============================================
     * HALAMAN ADMIN
     * ============================================
     */

    public function index(Request $request)
    {
        $query = Berita::query();

        if ($request->filled('search')) {

            $search = trim($request->search);

            $query->where(function ($q) use ($search) {
                $q->where('judul', 'ILIKE', "%{$search}%")
                ->orWhere('kategori', 'ILIKE', "%{$search}%")
                ->orWhere('ringkasan', 'ILIKE', "%{$search}%")
                ->orWhere('isi', 'ILIKE', "%{$search}%");
            });
        }

        $beritas = $query
            ->latest()
            ->paginate(10)
            ->withQueryString();

        return view('admin.berita.index', compact('beritas'));
    }
    public function create()
    {
        return view('admin.berita.create');
    }

    public function store(Request $request)
    {

        $request->validate([

            'judul' => 'required|max:255',

            'penulis' => 'required|max:100',

            'kategori' => 'required',

            'isi' => 'required',

            'status' => 'required',

            'thumbnail' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:4096',

        ]);


        $thumbnail = null;

        if ($request->hasFile('thumbnail')) {

            $thumbnail = $request
                ->file('thumbnail')
                ->store('berita', 'public');

        }


        Berita::create([

            'judul' => $request->judul,

            'slug' => Str::slug($request->judul),

            'penulis' => $request->penulis,

            'kategori' => $request->kategori,

            'isi' => $request->isi,

            'status' => $request->status,

            'thumbnail' => $thumbnail,

        ]);


        return redirect()
            ->route('admin.berita.index')
            ->with('success', 'Berita berhasil ditambahkan.');

    }

    public function show(Berita $berita)
    {
        return view('admin.berita.show', compact('berita'));
    }

    public function edit(Berita $berita)
    {
        return view('admin.berita.edit', compact('berita'));
    }

    public function update(Request $request, Berita $berita)
    {

        $request->validate([

            'judul' => 'required|max:255',

            'penulis' => 'required|max:100',

            'kategori' => 'required',

            'isi' => 'required',

            'status' => 'required',

            'thumbnail' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:4096',

        ]);


        $thumbnail = $berita->thumbnail;


        if ($request->hasFile('thumbnail')) {

            if ($thumbnail && Storage::disk('public')->exists($thumbnail)) {

                Storage::disk('public')->delete($thumbnail);

            }

            $thumbnail = $request
                ->file('thumbnail')
                ->store('berita', 'public');

        }


        $berita->update([

            'judul' => $request->judul,

            'slug' => Str::slug($request->judul),

            'penulis' => $request->penulis,

            'kategori' => $request->kategori,

            'isi' => $request->isi,

            'status' => $request->status,

            'thumbnail' => $thumbnail,

        ]);


        return redirect()
            ->route('admin.berita.index')
            ->with('success', 'Berita berhasil diperbarui.');

    }

    public function destroy(Berita $berita)
    {

        if ($berita->thumbnail) {

            Storage::disk('public')->delete($berita->thumbnail);

        }

        $berita->delete();

        return redirect()
            ->route('admin.berita.index')
            ->with('success', 'Berita berhasil dihapus.');

    }
}