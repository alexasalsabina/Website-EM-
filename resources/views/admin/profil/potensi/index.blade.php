@extends('admin.layouts.app')

@section('title','Potensi Desa')
@section('page-title','Potensi Desa')

@section('content')

<div class="p-8">

    <h1 class="text-3xl font-bold text-green-800">
        Potensi Desa
    </h1>

    <a href="{{ route('admin.profil.konten.index', 'potensi') }}" class="mt-4 inline-block rounded-lg bg-green-700 px-5 py-2 text-white">Kelola Data Potensi</a>

</div>

@endsection