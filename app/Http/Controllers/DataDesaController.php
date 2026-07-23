<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DataDesaController extends Controller
{
    public function index()
    {
        return view('admin.data-desa.index');
    }

    public function update(Request $request)
    {
        //
    }
}