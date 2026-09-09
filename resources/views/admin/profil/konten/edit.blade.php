@extends('admin.layouts.app')

@section('title', 'Edit ' . ucfirst($kategori))
@section('page-title', ucfirst($kategori))

@section('content')
<div class="p-8">
    <a href="{{ route('admin.profil.konten.index', $kategori) }}" class="text-sm font-semibold text-blue-700 hover:underline">&larr; Kembali</a>
    <h1 class="mt-3 text-3xl font-bold text-blue-900">Edit {{ ucfirst($kategori) }}</h1>
    @if($errors->any())<div class="my-5 rounded-xl bg-red-50 p-4 text-red-700">@foreach($errors->all() as $error)<p>{{ $error }}</p>@endforeach</div>@endif
    <form action="{{ route('admin.profil.konten.update', [$kategori, $konten]) }}" method="POST" enctype="multipart/form-data" class="mt-6 max-w-3xl rounded-2xl bg-white p-6 shadow-md">
        @csrf
        @method('PUT')
        @include('admin.profil.konten.form')
        <button class="rounded-xl bg-blue-700 px-5 py-3 font-semibold text-white hover:bg-blue-800">Simpan Perubahan</button>
    </form>
</div>
@endsection
