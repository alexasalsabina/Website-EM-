@extends('admin.layouts.app')

@section('title', 'Edit Inovasi Desa')
@section('page-title', 'Edit Inovasi Desa')

@section('content')

<div class="p-8">
    <div class="mb-8">
        <div class="flex flex-wrap items-center justify-between gap-4">
            <div>
                <h1 class="text-3xl font-bold text-blue-800">
                    Edit Inovasi Desa
                </h1>

                <p class="mt-2 text-gray-600">
                    Perbarui data inovasi Desa Jatisari.
                </p>
            </div>

            <a href="{{ route('admin.profil.inovasi.index') }}"
               class="rounded-lg bg-gray-500 px-5 py-3 font-semibold text-white hover:bg-gray-600">
                ← Kembali
            </a>
        </div>
    </div>

    <div class="max-w-4xl rounded-2xl bg-white p-8 shadow-md">
        <form action="{{ route('admin.profil.inovasi.update', $inovasi) }}"
              method="POST"
              enctype="multipart/form-data">

            @csrf
            @method('PUT')

            {{-- JUDUL --}}
            <div class="mb-6">
                <label for="judul"
                       class="mb-2 block text-lg font-semibold text-gray-700">
                    Judul Inovasi
                </label>

                <input
                    type="text"
                    id="judul"
                    name="judul"
                    value="{{ old('judul', $inovasi->judul) }}"
                    class="w-full rounded-lg border border-gray-300 px-4 py-3 text-base focus:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-200"
                    required
                >

                @error('judul')
                    <p class="mt-2 text-sm text-red-600">
                        {{ $message }}
                    </p>
                @enderror
            </div>

            {{-- DESKRIPSI --}}
            <div class="mb-6">
                <label for="deskripsi"
                       class="mb-2 block text-lg font-semibold text-gray-700">
                    Deskripsi Inovasi
                </label>

                <textarea
                    id="deskripsi"
                    name="deskripsi"
                    rows="7"
                    class="w-full rounded-lg border border-gray-300 px-4 py-3 text-base focus:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-200"
                    required
                >{{ old('deskripsi', $inovasi->deskripsi) }}</textarea>

                @error('deskripsi')
                    <p class="mt-2 text-sm text-red-600">
                        {{ $message }}
                    </p>
                @enderror
            </div>

            @if($inovasi->gambar)
                <div class="mb-6">
                    <p class="mb-3 text-lg font-semibold text-gray-700">
                        Gambar Saat Ini
                    </p>

                    <img
                        src="{{ asset('storage/' . $inovasi->gambar) }}"
                        alt="{{ $inovasi->judul }}"
                        class="h-52 w-80 rounded-xl object-cover shadow"
                    >
                </div>
            @endif

            <div class="mb-8">
                <label for="gambar"
                       class="mb-2 block text-lg font-semibold text-gray-700">
                    Ganti Gambar
                </label>

                <input
                    type="file"
                    id="gambar"
                    name="gambar"
                    accept=".jpg,.jpeg,.png"
                    class="w-full rounded-lg border border-gray-300 bg-white px-4 py-3"
                >

                <p class="mt-2 text-sm text-gray-500">
                    Kosongkan jika tidak ingin mengganti gambar.
                    Format JPG, JPEG, atau PNG. Maksimal 4 MB.
                </p>

                @error('gambar')
                    <p class="mt-2 text-sm text-red-600">
                        {{ $message }}
                    </p>
                @enderror
            </div>

            <div class="flex flex-wrap gap-3">
                <a href="{{ route('admin.profil.inovasi.index') }}"
                   class="rounded-lg bg-gray-500 px-6 py-3 font-semibold text-white hover:bg-gray-600">
                    Batal
                </a>

                <button
                    type="submit"
                    class="rounded-lg bg-blue-700 px-6 py-3 font-semibold text-white hover:bg-blue-800">
                    Simpan Perubahan
                </button>
            </div>
        </form>
    </div>
</div>
@endsection