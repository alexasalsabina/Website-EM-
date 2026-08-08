@extends('admin.layouts.app')

@section('title', 'Dashboard')

@section('page-title', 'Dashboard')

@section('content')

@push('styles')
    @vite('resources/css/admin/dashboard.css')
@endpush



<div class="p-8">

    <div class="mb-8">

        <h1 class="text-3xl font-bold text-green-800">
            Dashboard Admin Desa Jatisari
        </h1>

        <p class="mt-2 text-gray-600">
            Selamat datang kembali,
            <strong>{{ Auth::user()->name }}</strong> 👋
        </p>

    </div>


    <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-6">

        {{-- Berita --}}
        <a href="{{ route('admin.berita.index') }}"
           class="bg-white rounded-xl shadow-md p-6 hover:shadow-xl transition duration-300">

            <div class="flex justify-between items-start">

                <div>
                    <h3 class="text-xl font-semibold">📰 Berita</h3>

                    <p class="text-3xl font-bold text-green-800 mt-3">
                        {{ $stats['berita']['total'] }}
                    </p>
                    <p class="text-gray-500 text-sm">
                        {{ $stats['berita']['label'] }}
                    </p>
                </div>

                <span class="text-4xl">📰</span>

            </div>

            <div class="mt-5">
                <span class="text-green-700 font-semibold">Kelola →</span>
            </div>

        </a>

        {{-- Agenda --}}
        <a href="{{ route('admin.agenda.index') }}"
           class="bg-white rounded-xl shadow-md p-6 hover:shadow-xl transition duration-300">

            <div class="flex justify-between items-start">

                <div>
                    <h3 class="text-xl font-semibold">📅 Agenda</h3>

                    <p class="text-3xl font-bold text-green-800 mt-3">
                        {{ $stats['agenda']['total'] }}
                    </p>
                    <p class="text-gray-500 text-sm">
                        {{ $stats['agenda']['label'] }}
                        @if($stats['agenda']['mendatang'] > 0)
                            <span class="text-green-700 font-medium">
                                · {{ $stats['agenda']['mendatang'] }} mendatang
                            </span>
                        @endif
                    </p>
                </div>

                <span class="text-4xl">📅</span>

            </div>

            <div class="mt-5">
                <span class="text-green-700 font-semibold">Kelola →</span>
            </div>

        </a>


        {{-- Galeri --}}
        <a href="{{ route('admin.galeri-kategori.index') }}"
           class="bg-white rounded-xl shadow-md p-6 hover:shadow-xl transition duration-300">

            <div class="flex justify-between items-start">

                <div>
                    <h3 class="text-xl font-semibold">🖼 Galeri</h3>

                    <p class="text-3xl font-bold text-green-800 mt-3">
                        {{ $stats['galeri']['foto'] }}
                    </p>
                    <p class="text-gray-500 text-sm">
                        {{ $stats['galeri']['label'] }} · {{ $stats['galeri']['kategori'] }} kategori
                    </p>
                </div>

                <span class="text-4xl">🖼</span>

            </div>

            <div class="mt-5">
                <span class="text-green-700 font-semibold">Kelola →</span>
            </div>

        </a>


        {{-- Profil --}}
        <a href="{{ route('admin.profil.index') }}"
           class="bg-white rounded-xl shadow-md p-6 hover:shadow-xl transition duration-300">

            <div class="flex justify-between items-center">

                <div>
                    <h3 class="text-xl font-semibold">🏛 Profil Desa</h3>
                    <p class="text-gray-500 mt-2">Edit profil desa.</p>
                </div>

                <span class="text-4xl">🏛</span>

            </div>

            <div class="mt-5">
                <span class="text-green-700 font-semibold">Kelola →</span>
            </div>

        </a>


        {{-- Data Desa --}}
        <a href="{{ route('admin.data-desa.index') }}"
           class="bg-white rounded-xl shadow-md p-6 hover:shadow-xl transition duration-300">

            <div class="flex justify-between items-start">

                <div>
                    <h3 class="text-xl font-semibold">📊 Data Desa</h3>

                    <p class="text-3xl font-bold text-green-800 mt-3">
                        {{ $stats['data_desa']['total'] }}
                    </p>
                    <p class="text-gray-500 text-sm">
                        {{ $stats['data_desa']['label'] }}
                    </p>
                </div>

                <span class="text-4xl">📊</span>

            </div>

            <div class="mt-5">
                <span class="text-green-700 font-semibold">Kelola →</span>
            </div>

        </a>

    </div>

</div>

@endsection