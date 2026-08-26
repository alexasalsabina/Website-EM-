@extends('admin.layouts.app')

@section('title', 'Tambah Inovasi Desa')
@section('page-title', 'Tambah Inovasi Desa')

@section('content')

<div class="p-8">
    <div class="mb-8">
        <div class="flex flex-wrap items-center justify-between gap-4">
            <div>
                <h1 class="text-3xl font-bold text-blue-800">
                    Tambah Inovasi Desa
                </h1>

                <p class="mt-2 text-gray-600">
                    Tambahkan data inovasi baru Desa Jatisari.
                </p>
            </div>
        </div>
    </div>

    <div class="max-w-4xl rounded-2xl bg-white p-8 shadow-md">
        <form action="{{ route('admin.profil.inovasi.store') }}"
              method="POST"
              enctype="multipart/form-data">

            @csrf

            <div class="mb-6">
                <label for="judul"
                       class="mb-2 block text-lg font-semibold text-gray-700">
                    Judul Inovasi
                </label>

                <input
                    type="text"
                    id="judul"
                    name="judul"
                    value="{{ old('judul') }}"
                    placeholder="Contoh: Bank Sampah Desa"
                    class="w-full rounded-lg border border-gray-300 px-4 py-3 text-base focus:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-200"
                    required
                >

                @error('judul')
                    <p class="mt-2 text-sm text-red-600">
                        {{ $message }}
                    </p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="deskripsi"
                       class="mb-2 block text-lg font-semibold text-gray-700">
                    Deskripsi Inovasi
                </label>

                <textarea
                    id="deskripsi"
                    name="deskripsi"
                    rows="7"
                    placeholder="Jelaskan mengenai inovasi desa..."
                    class="w-full rounded-lg border border-gray-300 px-4 py-3 text-base focus:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-200"
                    required
                >{{ old('deskripsi') }}</textarea>

                @error('deskripsi')
                    <p class="mt-2 text-sm text-red-600">
                        {{ $message }}
                    </p>
                @enderror
            </div>

            {{-- GAMBAR --}}
            <div class="mb-8">

                <label for="gambar"
                       class="mb-2 block text-lg font-semibold text-gray-700">
                    Gambar Inovasi
                </label>

                <input
                    type="file"
                    id="gambar"
                    name="gambar"
                    accept=".jpg,.jpeg,.png"
                    class="w-full rounded-lg border border-gray-300 bg-white px-4 py-3"
                >

                <p class="mt-2 text-sm text-gray-500">
                    Format JPG, JPEG, atau PNG. Ukuran maksimal 4 MB.
                </p>

                @error('gambar')
                    <p class="mt-2 text-sm text-red-600">
                        {{ $message }}
                    </p>
                @enderror

            </div>


            {{-- BUTTON --}}
            <div class="flex flex-wrap gap-3">

                <a href="{{ route('admin.profil.inovasi.index') }}"
                   class="rounded-lg bg-gray-500 px-6 py-3 font-semibold text-white hover:bg-gray-600">
                    Batal
                </a>

                <button
                    type="submit"
                    class="rounded-lg bg-blue-700 px-6 py-3 font-semibold text-white hover:bg-blue-800">
                    Simpan Inovasi
                </button>

            </div>

        </form>

    </div>

</div>

@endsection