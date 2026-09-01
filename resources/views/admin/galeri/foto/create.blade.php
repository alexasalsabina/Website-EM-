@extends('admin.layouts.app')

@section('title', 'Tambah Foto - ' . $kategori->nama)
@section('page-title', $kategori->nama)

@section('content')
<div class="p-8">

    {{-- Header --}}
    <div class="mb-6 flex flex-wrap items-start justify-between gap-4">
        <div>
            <h1 class="text-2xl font-bold text-blue-900">Tambah Foto - {{ $kategori->nama }}</h1>
            <p class="text-gray-500 mt-1">
                Lengkapi detail foto yang akan ditambahkan ke album ini.
            </p>
        </div>

        <a href="{{ route('admin.galeri-foto.index', $kategori) }}"
           class="bg-gray-100 text-gray-700 px-4 py-2 rounded-lg font-semibold hover:bg-gray-200 transition whitespace-nowrap">
            &larr; Kembali ke daftar foto
        </a>
    </div>

    {{-- Form Card --}}
    <div class="bg-white rounded-xl shadow-md p-8">
        <form action="{{ route('admin.galeri-foto.store', $kategori) }}" method="POST" enctype="multipart/form-data">
            @csrf

            {{-- Judul --}}
            <div class="mb-5">
                <label class="block font-semibold text-gray-700 mb-1">Judul</label>
                <input type="text" name="judul" value="{{ old('judul') }}"
                       placeholder="Contoh: Renovasi Tahap 2"
                       class="w-full border rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-700 @error('judul') border-red-500 @enderror">
                @error('judul')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Tahun --}}
            <div class="mb-5">
                <label class="block font-semibold text-gray-700 mb-1">Tahun</label>
                <input type="number" name="tahun" value="{{ old('tahun') }}"
                       placeholder="Contoh: 2020" min="1900" max="{{ date('Y') + 1 }}"
                       class="w-full sm:w-64 border rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-700 @error('tahun') border-red-500 @enderror">
                @error('tahun')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Keterangan --}}
            <div class="mb-5">
                <label class="block font-semibold text-gray-700 mb-1">Keterangan (opsional)</label>
                <textarea name="keterangan" rows="3"
                          class="w-full border rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-700 @error('keterangan') border-red-500 @enderror">{{ old('keterangan') }}</textarea>
                @error('keterangan')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Foto --}}
            <div class="mb-6">
                <label class="block font-semibold text-gray-700 mb-1">Foto</label>
                <input type="file" name="foto" accept="image/*"
                       class="w-full border rounded-lg px-4 py-2 file:mr-4 file:py-1.5 file:px-4 file:rounded-md file:border-0 file:bg-blue-800 file:text-white file:font-semibold hover:file:bg-blue-900 file:cursor-pointer @error('foto') border-red-500 @enderror">
                @error('foto')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
                <p class="text-gray-400 text-xs mt-1">Format: JPG/PNG, maks 4MB.</p>
            </div>

            {{-- Actions --}}
            <div class="flex items-center gap-3 border-t pt-5">
                <button type="submit"
                        class="bg-blue-800 text-white px-5 py-2 rounded-lg font-semibold hover:bg-blue-900 transition">
                    Simpan
                </button>
                <a href="{{ route('admin.galeri-foto.index', $kategori) }}"
                   class="bg-gray-100 text-gray-700 px-5 py-2 rounded-lg font-semibold hover:bg-gray-200 transition">
                    Batal
                </a>
            </div>
        </form>
    </div>

</div>
@endsection