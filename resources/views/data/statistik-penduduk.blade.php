@extends('layouts.app')

@section('title', 'Statistik Penduduk')

@section('content')
    <div class="statistik-penduduk-page container mx-auto px-4 py-8 text-white sm:px-8">
        <h1 class="mb-4 text-center text-3xl font-extrabold text-white">Statistik Penduduk Desa Jatisari</h1>

        @php
            $jsonPath = storage_path('app/statistik.json');
            $rows = null;
            if (file_exists($jsonPath)) {
                $content = file_get_contents($jsonPath);
                $rows = json_decode($content, true);
            }
        @endphp

        @if($rows && is_array($rows) && count($rows) > 0)
            <div class="overflow-x-auto">
                <table class="min-w-full bg-white border">
                    <thead>
                        <tr class="bg-gray-100">
                            @foreach(array_keys($rows[0]) as $col)
                                <th class="px-4 py-2 border text-left">{{ $col }}</th>
                            @endforeach
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($rows as $r)
                            <tr>
                                @foreach($r as $cell)
                                    <td class="px-4 py-2 border">{{ $cell }}</td>
                                @endforeach
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif

        <div class="grid grid-cols-1 gap-4 sm:grid-cols-3">
            <div class="p-4 bg-white/90 border border-white/20 rounded-xl shadow-sm text-center">
                <div class="statistik__number text-3xl font-bold text-[#08233a]" data-target="3118">0</div>
                <div class="text-sm text-[#38617b]">Penduduk</div>
            </div>
            <div class="p-4 bg-white/90 border border-white/20 rounded-xl shadow-sm text-center">
                <div class="statistik__number text-3xl font-bold text-[#08233a]" data-target="1247">0</div>
                <div class="text-sm text-[#38617b]">Laki-laki</div>
            </div>
            <div class="p-4 bg-white/90 border border-white/20 rounded-xl shadow-sm text-center">
                <div class="statistik__number text-3xl font-bold text-[#08233a]" data-target="1871">0</div>
                <div class="text-sm text-[#38617b]">Perempuan</div>
            </div>
        </div>

        <section class="statistik-poin" aria-labelledby="statistik-poin-title">
            <h2 id="statistik-poin-title" class="statistik-poin__title text-center font-extrabold">Data yang Tersedia</h2>
            <div class="statistik-poin__grid">
                <a href="{{ route('data.statistik-penduduk.kategori', 'demografi') }}" class="statistik-poin__card">
                    <span class="statistik-poin__icon" aria-hidden="true">&#128101;</span>
                    <span class="statistik-poin__badge" aria-hidden="true">01</span>
                    <h3>1. Demografi Penduduk</h3>
                    <p class="statistik-poin__description">Informasi jumlah, komposisi, dan persebaran penduduk desa.</p>
                    <span class="statistik-poin__arrow" aria-hidden="true">&rarr;</span>
                </a>

                <a href="{{ route('data.statistik-penduduk.kategori', 'sosial-pendidikan') }}" class="statistik-poin__card">
                    <span class="statistik-poin__icon" aria-hidden="true">&#127891;</span>
                    <span class="statistik-poin__badge" aria-hidden="true">02</span>
                    <h3>2. Status Sosial &amp; Pendidikan</h3>
                    <p class="statistik-poin__description">Data tingkat pendidikan, status perkawinan, agama, dan kondisi sosial.</p>
                    <span class="statistik-poin__arrow" aria-hidden="true">&rarr;</span>
                </a>

                <a href="{{ route('data.statistik-penduduk.submenu', ['kategori' => 'ekonomi', 'submenu' => 'mata-pencaharian']) }}" class="statistik-poin__card">
                    <span class="statistik-poin__icon" aria-hidden="true">&#128188;</span>
                    <span class="statistik-poin__badge" aria-hidden="true">03</span>
                    <h3>3. Pekerjaan / Mata Pencaharian</h3>
                    <p class="statistik-poin__description">Informasi jenis pekerjaan dan mata pencaharian utama penduduk desa.</p>
                    <span class="statistik-poin__arrow" aria-hidden="true">&rarr;</span>
                </a>

                <a href="{{ route('data.statistik-penduduk.submenu', ['kategori' => 'inklusi', 'submenu' => 'penyandang-disabilitas']) }}" class="statistik-poin__card">
                    <span class="statistik-poin__icon" aria-hidden="true">&#9855;</span>
                    <span class="statistik-poin__badge" aria-hidden="true">04</span>
                    <h3>4. Penyandang Disabilitas</h3>
                    <p class="statistik-poin__description">Data penyandang disabilitas berdasarkan jenis dan tingkat kebutuhan.</p>
                    <span class="statistik-poin__arrow" aria-hidden="true">&rarr;</span>
                </a>
            </div>
        </section>
    </div>
@endsection
