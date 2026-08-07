<?php

namespace App\Http\Controllers;

use App\Exports\AspirasiExport;
use App\Models\Aspirasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;

class AspirasiController extends Controller
{
    // Halaman masyarakat
    public function index()
    {
        return view('partials.aspirasi');
    }

    // Simpan aspirasi warga
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama'         => 'nullable|string|max:255',
            'alamat'       => 'nullable|string|max:255',
            'kategori'     => 'nullable|string|max:100',
            'isi_aspirasi' => 'required|string',
            'foto'         => 'nullable|image|max:2048', // max 2MB
        ]);

        if ($request->hasFile('foto')) {
            $validated['foto'] = $request->file('foto')->store('aspirasi', 'public');
        }

        Aspirasi::create($validated);

        return back()->with('success', 'Terima kasih, aspirasi Anda berhasil dikirim.');
    }

    // Dashboard admin — list semua aspirasi
    public function admin(Request $request)
    {
        $query = Aspirasi::query()->latest();

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        if ($request->filled('kategori')) {
            $query->where('kategori', $request->kategori);
        }

        $aspirasis = $query->paginate(15)->withQueryString();

        return view('admin.aspirasi.index', compact('aspirasis'));
    }

    // Detail aspirasi
    public function show($id)
    {
        $aspirasi = Aspirasi::findOrFail($id);

        return view('admin.aspirasi.show', compact('aspirasi'));
    }

    // Update status aspirasi
    public function update(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:baru,diproses,selesai',
        ]);

        $aspirasi = Aspirasi::findOrFail($id);
        $aspirasi->update(['status' => $request->status]);

        return back()->with('success', 'Status aspirasi berhasil diperbarui.');
    }

    // Hapus aspirasi
    public function destroy($id)
    {
        $aspirasi = Aspirasi::findOrFail($id);

        if ($aspirasi->foto) {
            Storage::disk('public')->delete($aspirasi->foto);
        }

        $aspirasi->delete();

        return redirect()
            ->route('admin.aspirasi.index')
            ->with('success', 'Aspirasi berhasil dihapus.');
    }

    // Export ke Excel
    public function export()
    {
        return Excel::download(new AspirasiExport, 'aspirasi-warga-jatisari.xlsx');
    }
}