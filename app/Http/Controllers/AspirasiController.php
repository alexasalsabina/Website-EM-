<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AspirasiController extends Controller
{
    public function index()
    {
        return view('partials.aspirasi');
    }

    public function store(Request $request)
    {
        // Simpan ke Supabase

        return redirect()
            ->route('aspirasi.index')
            ->with('success', 'Terima kasih! Aspirasi Anda berhasil dikirim.');
    }
}