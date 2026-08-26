@extends('admin.layouts.app')

@section('title', 'Foto - ' . $kategori->nama)
@section('page-title', $kategori->nama)

@section('content')
<div class="p-8">

    {{-- Header --}}
    <div class="mb-6 flex flex-wrap items-start justify-between gap-4">
        <div>
            <a href="{{ route('admin.galeri-kategori.index') }}"
               class="text-gray-500 text-sm hover:text-blue-800 transition inline-flex items-center gap-1 mb-1">
                &larr; Kembali ke daftar kategori
            </a>
            <h1 class="text-2xl font-bold text-blue-900">Foto - {{ $kategori->nama }}</h1>
            <p class="text-gray-500 mt-1">
                Kelola foto pada album {{ $kategori->nama }}.
            </p>
        </div>

        <a href="{{ route('admin.galeri-foto.create', $kategori) }}"
           class="bg-blue-800 text-white px-4 py-2 rounded-lg font-semibold hover:bg-blue-900 transition whitespace-nowrap">
            + Tambah Foto
        </a>
    </div>

    {{-- Success alert --}}
    @if (session('success'))
        <div class="mb-6 bg-blue-100 border border-blue-300 text-blue-800 px-4 py-3 rounded-lg text-sm">
            {{ session('success') }}
        </div>
    @endif

    @php
        $fotosByTahun = $fotos->groupBy('tahun')->sortKeysDesc();
    @endphp

    @forelse ($fotosByTahun as $tahun => $fotoTahunIni)

        <div class="flex items-center gap-3 mt-8 mb-4 first:mt-0">
            <h2 class="text-lg font-semibold text-gray-700">Tahun {{ $tahun }}</h2>
            <span class="h-px flex-1 bg-gray-200"></span>
        </div>

        {{-- Grid Card --}}
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
            @foreach ($fotoTahunIni as $foto)
                <div class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-xl transition duration-300">

                    {{-- Thumbnail --}}
                    <div class="h-40 bg-gray-100 flex items-center justify-center">
                        <img src="{{ Storage::url($foto->foto) }}"
                             alt="{{ $foto->judul }}"
                             class="w-full h-40 object-cover">
                    </div>

                    <div class="p-5">
                        <h3 class="font-semibold text-gray-800 mb-1 line-clamp-2">
                            {{ $foto->judul }}
                        </h3>

                        @if ($foto->keterangan)
                            <p class="text-gray-500 text-sm mb-4 line-clamp-2">
                                {{ Str::limit($foto->keterangan, 60) }}
                            </p>
                        @else
                            <p class="text-gray-400 text-sm mb-4 italic">Tanpa keterangan</p>
                        @endif

                        <div class="flex items-center justify-between border-t pt-3">
                            <a href="{{ route('admin.galeri-foto.edit', [$kategori, $foto]) }}"
                               class="text-blue-800 font-semibold hover:underline text-sm">
                                Edit
                            </a>

                            <form action="{{ route('admin.galeri-foto.destroy', [$kategori, $foto]) }}" method="POST"
                                  onsubmit="return confirm('Yakin hapus foto ini?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 font-semibold hover:underline text-sm">
                                    Hapus
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

    @empty
        {{-- Empty state --}}
        <div class="bg-white rounded-xl shadow-md p-12 text-center">
            <div class="text-5xl mb-4">🖼️</div>
            <h3 class="text-lg font-semibold text-gray-700 mb-1">Belum ada foto</h3>
            <p class="text-gray-500 mb-4">Klik "Tambah Foto" untuk mulai mengisi album {{ $kategori->nama }}.</p>
        </div>
    @endforelse

</div>
@endsection