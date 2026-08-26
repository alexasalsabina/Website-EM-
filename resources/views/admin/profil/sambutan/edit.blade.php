@extends('admin.layouts.app')

@section('title', 'Sambutan Kepala Desa')
@section('page-title', 'Sambutan Kepala Desa')

@section('content')
<div class="p-8">

    {{-- Header --}}
    <div class="mb-6 flex flex-wrap items-start justify-between gap-4">
        <div>
            <h1 class="text-2xl font-bold text-blue-900">Kelola Sambutan Kepala Desa</h1>
            <p class="text-gray-500 mt-1">
                Ubah nama, foto, dan isi sambutan yang tampil di halaman publik.
            </p>
        </div>

        <a href="{{ route('admin.profil.index') }}"
           class="bg-gray-100 text-gray-700 px-4 py-2 rounded-lg font-semibold hover:bg-gray-200 transition whitespace-nowrap">
            &larr; Kembali
        </a>
    </div>

    {{-- Success alert --}}
    @if (session('success'))
        <div class="mb-6 bg-blue-100 border border-blue-300 text-blue-800 px-4 py-3 rounded-lg text-sm">
            {{ session('success') }}
        </div>
    @endif

    {{-- Form Card --}}
    <div class="bg-white rounded-xl shadow-md p-8">
        <form action="{{ route('admin.profil.sambutan.update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

                {{-- Kolom kiri: nama & foto --}}
                <div class="lg:col-span-1 space-y-5">

                    {{-- Nama Kepala Desa --}}
                    <div>
                        <label class="block font-semibold text-gray-700 mb-1">Nama Kepala Desa</label>
                        <input type="text" name="nama_kepala_desa"
                               value="{{ old('nama_kepala_desa', $sambutan->nama_kepala_desa ?? '') }}"
                               placeholder="Contoh: Budi Santoso"
                               class="w-full border rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-700 @error('nama_kepala_desa') border-red-500 @enderror">
                        @error('nama_kepala_desa')
                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Foto --}}
                    <div>
                        <label class="block font-semibold text-gray-700 mb-1">Foto Kepala Desa</label>

                        @if (!empty($sambutan->foto ?? null))
                            <img src="{{ Storage::url($sambutan->foto) }}"
                                 alt="Foto Kepala Desa"
                                 class="w-40 h-40 object-cover rounded-lg mb-3 border">
                        @endif

                        <input type="file" name="foto" accept="image/*"
                               class="w-full border rounded-lg px-4 py-2 file:mr-4 file:py-1.5 file:px-4 file:rounded-md file:border-0 file:bg-blue-800 file:text-white file:font-semibold hover:file:bg-blue-900 file:cursor-pointer @error('foto') border-red-500 @enderror">
                        @error('foto')
                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                        <p class="text-gray-400 text-xs mt-1">Format: JPG/PNG, maks 4MB.</p>
                    </div>

                </div>

                {{-- Kolom kanan: isi sambutan --}}
                <div class="lg:col-span-2">
                    <label class="block font-semibold text-gray-700 mb-1">Isi Sambutan</label>
                    <textarea name="isi_sambutan" rows="14"
                              placeholder="Tulis isi sambutan Kepala Desa di sini..."
                              class="w-full h-full min-h-[320px] border rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-700 @error('isi_sambutan') border-red-500 @enderror">{{ old('isi_sambutan', $sambutan->isi_sambutan ?? '') }}</textarea>
                    @error('isi_sambutan')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

            </div>

            {{-- Actions --}}
            <div class="flex items-center gap-3 border-t pt-5 mt-8">
                <button type="submit"
                        class="bg-blue-800 text-white px-5 py-2 rounded-lg font-semibold hover:bg-blue-900 transition">
                    Simpan
                </button>
                <a href="{{ route('admin.profil.index') }}"
                   class="bg-gray-100 text-gray-700 px-5 py-2 rounded-lg font-semibold hover:bg-gray-200 transition">
                    Batal
                </a>
            </div>
        </form>
    </div>

</div>
@endsection