@extends('admin.layouts.app')

@section('title','Sambutan Kepala Desa')
@section('page-title','Sambutan Kepala Desa')

@section('content')

<div class="p-8">

    <h1 class="text-3xl font-bold text-green-800">
        Sambutan Kepala Desa
    </h1>

    <p class="text-gray-500 mt-2">
        Halaman ini digunakan untuk mengelola sambutan Kepala Desa.
    </p>

    <a href="{{ route('admin.profil.sambutan') }}"
    class="inline-block bg-green-700 hover:bg-green-800 text-white font-bold px-8 py-3 rounded-full">
        Kelola
    </a>

</div>

@endsection