<?php

namespace App\Http\Controllers;

use App\Models\Agenda;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class AgendaController extends Controller
{
    /**
     * ==========================================
     * HALAMAN WARGA
     * ==========================================
     */

    public function publicIndex()
    {
        $agendas = Agenda::where('status', 'publish')
            ->orderBy('tanggal_mulai', 'desc')
            ->paginate(6);

        return view('berita.agenda', compact('agendas'));
    }

    public function publicShow($slug)
    {
        $agenda = Agenda::where('slug', $slug)
            ->where('status', 'publish')
            ->firstOrFail();

        return view('berita.detail-agenda', compact('agenda'));
    }

    /**
     * ==========================================
     * HALAMAN ADMIN
     * ==========================================
     */

    public function index(Request $request)
    {
        $query = Agenda::query();

        if ($request->filled('search')) {

            $query->where('judul', 'like', '%' . $request->search . '%');

        }

        $agendas = $query
            ->orderBy('tanggal_mulai', 'desc')
            ->paginate(10);

        return view('admin.agenda.index', compact('agendas'));
    }

    public function create()
    {
        return view('admin.agenda.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|max:255',
            'lokasi' => 'required|max:255',
            'penanggung_jawab' => 'required|max:255',
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'required|date|after_or_equal:tanggal_mulai',
            'deskripsi' => 'required',
            'status' => 'required',
            'thumbnail' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:4096',
        ]);

        $thumbnail = null;

        if ($request->hasFile('thumbnail')) {

            $thumbnail = $request
                ->file('thumbnail')
                ->store('agenda', 'public');

        }

        Agenda::create([

            'judul' => $request->judul,

            'slug' => Str::slug($request->judul),

            'lokasi' => $request->lokasi,

            'penanggung_jawab' => $request->penanggung_jawab,

            'tanggal_mulai' => $request->tanggal_mulai,

            'tanggal_selesai' => $request->tanggal_selesai,

            'deskripsi' => $request->deskripsi,

            'thumbnail' => $thumbnail,

            'status' => $request->status,

        ]);

        return redirect()
            ->route('admin.agenda.index')
            ->with('success', 'Agenda berhasil ditambahkan.');
    }

    public function show(Agenda $agenda)
    {
        return view('admin.agenda.show', compact('agenda'));
    }

    public function edit(Agenda $agenda)
    {
        return view('admin.agenda.edit', compact('agenda'));
    }

    public function update(Request $request, Agenda $agenda)
    {
        $request->validate([
            'judul' => 'required|max:255',
            'lokasi' => 'required|max:255',
            'penanggung_jawab' => 'required|max:255',
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'required|date|after_or_equal:tanggal_mulai',
            'deskripsi' => 'required',
            'status' => 'required',
            'thumbnail' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:4096',
        ]);

        $thumbnail = $agenda->thumbnail;

        if ($request->hasFile('thumbnail')) {

            if ($thumbnail && Storage::disk('public')->exists($thumbnail)) {

                Storage::disk('public')->delete($thumbnail);

            }

            $thumbnail = $request
                ->file('thumbnail')
                ->store('agenda', 'public');
        }

        $agenda->update([

            'judul' => $request->judul,

            'slug' => Str::slug($request->judul),

            'lokasi' => $request->lokasi,

            'penanggung_jawab' => $request->penanggung_jawab,

            'tanggal_mulai' => $request->tanggal_mulai,

            'tanggal_selesai' => $request->tanggal_selesai,

            'deskripsi' => $request->deskripsi,

            'thumbnail' => $thumbnail,

            'status' => $request->status,

        ]);

        return redirect()
            ->route('admin.agenda.index')
            ->with('success', 'Agenda berhasil diperbarui.');
    }

    public function destroy(Agenda $agenda)
    {
        if ($agenda->thumbnail) {

            Storage::disk('public')->delete($agenda->thumbnail);

        }

        $agenda->delete();

        return redirect()
            ->route('admin.agenda.index')
            ->with('success', 'Agenda berhasil dihapus.');
    }
}