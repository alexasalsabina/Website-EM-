<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PeraturanDesa;
use Illuminate\Http\Request;

class PeraturanDesaController extends Controller
{
    public function index()
    {
        $peraturans = PeraturanDesa::latest('tahun')->latest('id')->get();

        return view('admin.data-desa.peraturan.index', compact('peraturans'));
    }

    public function create()
    {
        return view('admin.data-desa.peraturan.create');
    }

    public function store(Request $request)
    {
        PeraturanDesa::create($this->validated($request));

        return redirect()->route('admin.data-desa.peraturan.index')
            ->with('success', 'Peraturan desa berhasil ditambahkan.');
    }

    public function edit(PeraturanDesa $peraturan)
    {
        return view('admin.data-desa.peraturan.edit', compact('peraturan'));
    }

    public function update(Request $request, PeraturanDesa $peraturan)
    {
        $peraturan->update($this->validated($request));

        return redirect()->route('admin.data-desa.peraturan.index')
            ->with('success', 'Peraturan desa berhasil diperbarui.');
    }

    public function destroy(PeraturanDesa $peraturan)
    {
        $peraturan->delete();

        return back()->with('success', 'Peraturan desa berhasil dihapus.');
    }

    private function validated(Request $request): array
    {
        return $request->validate([
            'judul' => 'required|string|max:255',
            'tahun' => 'required|integer|min:1900|max:2200',
            'isi' => 'required|string',
        ]);
    }
}
