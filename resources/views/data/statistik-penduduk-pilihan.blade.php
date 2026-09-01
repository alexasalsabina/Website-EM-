@extends('layouts.app')

@section('title', $category['title'])

@section('content')
    <div class="container mx-auto px-4 py-8 text-white sm:px-8">
        <h1 class="text-2xl font-bold text-white">{{ $category['title'] }}</h1>
        @if(!empty($category['direct']))
            <p class="mt-2 mb-6 text-white/80">Menu utama data {{ strtolower($category['directLabel']) }} penduduk desa.</p>
        @else
            <p class="mt-2 mb-6 text-white/80">Pilih salah satu sub-menu untuk melihat data.</p>
        @endif

        @if(!empty($category['direct']))
            <a href="{{ route('data.statistik-penduduk.submenu', ['kategori' => $kategori, 'submenu' => \Illuminate\Support\Str::slug($category['directLabel'])]) }}" class="statistik-submenu-link">
                <span class="text-lg font-bold">{{ $category['directLabel'] }}</span>
                <span class="statistik-submenu-link__action">Lihat data <span aria-hidden="true">&rarr;</span></span>
            </a>
        @else
            <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                @foreach($category['items'] as $item)
                    <a href="{{ route('data.statistik-penduduk.submenu', ['kategori' => $kategori, 'submenu' => \Illuminate\Support\Str::slug($item)]) }}" class="statistik-submenu-link">
                        <span class="text-lg font-bold">{{ $item }}</span>
                        <span class="statistik-submenu-link__action">Lihat data <span aria-hidden="true">&rarr;</span></span>
                    </a>
                @endforeach
            </div>
        @endif

        <a href="{{ route('data.statistik-penduduk') }}" class="mt-6 inline-block font-bold text-[#9bdaf2] hover:text-white">
            &larr; Kembali ke Statistik Penduduk
        </a>
    </div>
@endsection