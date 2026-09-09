@extends('admin.layouts.app')

@section('title', 'Tambah Peraturan Desa')
@section('page-title', 'Peraturan Desa')

@section('content')
<div class="p-8">
    <div class="mb-6">
        <a href="{{ route('admin.data-desa.peraturan.index') }}" class="text-sm font-semibold text-blue-700 hover:underline">&larr; Kembali</a>
        <h1 class="mt-3 text-3xl font-bold text-blue-900">Tambah Peraturan Desa</h1>
        <p class="mt-1 text-gray-500">Isi judul, tahun, dan teks peraturan desa.</p>
    </div>

    @if($errors->any())
        <div class="mb-6 rounded-xl border border-red-200 bg-red-50 p-4 text-red-700">
            @foreach($errors->all() as $error)<p>{{ $error }}</p>@endforeach
        </div>
    @endif

    <form action="{{ route('admin.data-desa.peraturan.store') }}" method="POST" class="max-w-4xl rounded-2xl bg-white p-6 shadow-md">
        @csrf
        @include('admin.data-desa.peraturan.form')
        <button class="rounded-xl bg-blue-700 px-5 py-3 font-semibold text-white hover:bg-blue-800">Simpan Peraturan</button>
    </form>
</div>
@endsection
