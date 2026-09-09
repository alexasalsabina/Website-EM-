@extends('layouts.app')

@section('title', 'Statistik Penduduk')

@section('content')
    <div class="statistik-penduduk-page container mx-auto px-4 py-8 text-white sm:px-8">
        <h1 class="mb-4 text-center text-3xl font-extrabold text-white">Statistik Penduduk Desa Jatisari</h1>

        <div class="grid grid-cols-1 gap-4 sm:grid-cols-3">
            <div class="p-4 bg-white/90 border border-white/20 rounded-xl shadow-sm text-center">
                <div class="statistik__number text-3xl font-bold text-[#08233a]" data-target="{{ $totalPenduduk }}">0</div>
                <div class="text-sm text-[#38617b]">Penduduk</div>
            </div>
            <div class="p-4 bg-white/90 border border-white/20 rounded-xl shadow-sm text-center">
                <div class="statistik__number text-3xl font-bold text-[#08233a]" data-target="{{ $totalLakiLaki }}">0</div>
                <div class="text-sm text-[#38617b]">Laki-laki</div>
            </div>
            <div class="p-4 bg-white/90 border border-white/20 rounded-xl shadow-sm text-center">
                <div class="statistik__number text-3xl font-bold text-[#08233a]" data-target="{{ $totalPerempuan }}">0</div>
                <div class="text-sm text-[#38617b]">Perempuan</div>
            </div>
        </div>

        <section class="statistik-poin" aria-labelledby="statistik-poin-title">
            <h2 id="statistik-poin-title" class="statistik-poin__title text-center font-extrabold">Data yang Tersedia</h2>
            <div class="statistik-poin__grid">
                @foreach($categories as $kategori => $category)
                    <a href="{{ route('data.statistik-penduduk.kategori', $kategori) }}" class="statistik-poin__card">
                        <span class="statistik-poin__icon" aria-hidden="true">{!! $category['icon'] !!}</span>
                        <span class="statistik-poin__badge" aria-hidden="true">{{ str_pad($loop->iteration, 2, '0', STR_PAD_LEFT) }}</span>
                        <h3>{{ $loop->iteration }}. {{ $category['title'] }}</h3>
                        <p class="statistik-poin__description">{{ $category['description'] }}</p>
                        <span class="statistik-poin__arrow" aria-hidden="true">&rarr;</span>
                    </a>
                @endforeach
            </div>
        </section>
    </div>
@endsection