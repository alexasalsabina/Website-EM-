<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
        //
    }

    // Dashboard admin
    public function admin()
    {
        return view('admin.aspirasi.index');
    }

    // Detail aspirasi
    public function show($id)
    {
        return view('admin.aspirasi.show');
    }

    // Update status aspirasi
    public function update(Request $request, $id)
    {
        //
    }

    // Hapus aspirasi
    public function destroy($id)
    {
        //
    }
}