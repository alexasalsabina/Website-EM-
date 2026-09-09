@extends('admin.layouts.app')

@section('title', 'Data Desa')
@section('page-title', 'Data Desa')

@section('content')
<div class="p-8">

    <div class="mb-8">
        <h1 class="text-3xl font-bold text-blue-800">Kelola Data Desa</h1>
        <p class="mt-1 text-gray-500">Kelola seluruh informasi data Desa Jatisari.</p>
    </div>

    <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 xl:grid-cols-3">

        {{-- Statistik --}}
        <div class="rounded-2xl bg-white p-6 text-center shadow-md">
            <div class="mb-3 text-4xl">📊</div>
            <h3 class="text-lg font-bold text-gray-800">Statistik</h3>
            <p class="mt-1 text-sm text-gray-500">Kelola statistik data kependudukan.</p>
            <a href="{{ route('admin.data-desa.statistik') }}"
               class="mt-4 inline-block w-full rounded-xl bg-blue-700 px-4 py-2.5 font-semibold text-white transition hover:bg-blue-800">
                Kelola
            </a>
        </div>

        {{-- Peraturan --}}
        <div class="rounded-2xl bg-white p-6 text-center shadow-md">
            <div class="mb-3 text-4xl">📜</div>
            <h3 class="text-lg font-bold text-gray-800">Peraturan Desa</h3>
            <p class="mt-1 text-sm text-gray-500">Kelola data peraturan desa.</p>
            <a href="{{ route('admin.data-desa.peraturan.index') }}"
               class="mt-4 inline-block w-full rounded-xl bg-blue-700 px-4 py-2.5 font-semibold text-white transition hover:bg-blue-800">
                Kelola
            </a>
        </div>

    </div>

</div>
@endsection