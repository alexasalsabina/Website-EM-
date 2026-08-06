<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfilDesaController extends Controller
{
    /**
     * Halaman utama Profil Desa
     */
    public function index()
    {
        return view('admin.profil.index');
    }

    /**
     * Sambutan Kepala Desa
     */
    public function sambutan()
    {
        return view('admin.profil.sambutan.index');
    }

    /**
     * Struktur Pemerintahan
     */
    public function struktur()
    {
        return view('admin.profil.struktur.index');
    }

    /**
     * Potensi Desa
     */
    public function potensi()
    {
        return view('admin.profil.potensi.index');
    }

    /**
     * Inovasi Desa
     */
    public function inovasi()
    {
        return view('admin.profil.inovasi.index');
    }

    /**
     * Prestasi Desa
     */
    public function prestasi()
    {
        return view('admin.profil.prestasi.index');
    }
}