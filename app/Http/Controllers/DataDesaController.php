<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DataDesaController extends Controller
{
    public function index()
    {
        return view('admin.data-desa.index');
    }

    public function anggaran()
    {
        return view('admin.data-desa.anggaran.index');
    }

    public function danaDesa()
    {
        return view('admin.data-desa.dana-desa.index');
    }

    public function peraturan()
    {
        return view('admin.data-desa.peraturan.index');
    }

    public function monografi()
    {
        return view('admin.data-desa.monografi.edit');
    }

    public function aset()
    {
        return view('admin.data-desa.aset.index');
    }

    public function statistik()
    {
        return view('admin.data-desa.statistik.edit');
    }

    public function integrasi()
    {
        return view('admin.data-desa.integrasi.edit');
    }
}