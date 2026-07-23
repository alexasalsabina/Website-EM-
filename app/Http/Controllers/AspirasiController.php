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
        //
    }
}