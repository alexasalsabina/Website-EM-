<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BeritaController extends Controller
{
    public function index()
    {
        return view('admin.berita.index');
    }

    public function create()
    {
        return view('admin.berita.create');
    }

    public function store(Request $request)
    {
        //
    }

    public function edit($id)
    {
        return view('admin.berita.edit');
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}