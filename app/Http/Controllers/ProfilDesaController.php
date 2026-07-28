<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfilDesaController extends Controller
{
    public function index()
    {
        return view('admin.profil.index');
    }

    public function update(Request $request)
    {
        // Update data profil desa ke Supabase
    }
}