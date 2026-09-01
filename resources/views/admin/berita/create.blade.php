@extends('admin.layouts.app')

@section('title', 'Tambah Berita')

@section('page-title', 'Tambah Berita')

@section('content')

<div class="p-8">

    {{-- Header --}}
    <div class="flex items-start justify-between mb-8">

        <div>
            <h2 class="text-2xl font-bold text-blue-900">
                Tambah Berita
            </h2>

            <p class="text-gray-600 mt-1">
                Tambahkan berita baru untuk website Desa Jatisari.
            </p>
        </div>

        <a href="{{ route('admin.berita.index') }}"
           class="inline-flex items-center gap-1 text-blue-800 font-semibold hover:underline">
            <span aria-hidden="true">←</span> Kembali
        </a>

    </div>


    {{-- Error --}}
    @if($errors->any())
        <div class="mb-6 rounded-lg border border-red-200 bg-red-50 text-red-700 px-4 py-3">
            <ul class="list-disc list-inside space-y-1">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif


    <form action="{{ route('admin.berita.store') }}"
          method="POST"
          enctype="multipart/form-data">

        @csrf

        <div class="bg-white rounded-xl shadow-md p-6">

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                {{-- Judul --}}
                <div class="md:col-span-2">
                    <label class="block text-sm font-semibold text-gray-700 mb-1">
                        Judul Berita
                    </label>
                    <input
                        type="text"
                        name="judul"
                        value="{{ old('judul') }}"
                        required
                        class="w-full rounded-lg border border-gray-300 px-4 py-2.5 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                </div>

                {{-- Penulis --}}
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1">
                        Penulis
                    </label>
                    <input
                        type="text"
                        name="penulis"
                        value="{{ old('penulis', Auth::user()->name) }}"
                        required
                        class="w-full rounded-lg border border-gray-300 px-4 py-2.5 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                </div>

                {{-- Kategori --}}
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1">
                        Kategori
                    </label>
                    <select
                        name="kategori"
                        class="w-full rounded-lg border border-gray-300 px-4 py-2.5 bg-white focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                        <option value="Berita">Berita</option>
                    </select>
                </div>

                {{-- Thumbnail --}}
                <div class="md:col-span-2">
                    <label class="block text-sm font-semibold text-gray-700 mb-1">
                        Thumbnail
                    </label>
                    <input
                        type="file"
                        name="thumbnail"
                        accept="image/*"
                        class="w-full rounded-lg border border-gray-300 px-4 py-2 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:bg-blue-50 file:text-blue-700 file:font-semibold hover:file:bg-blue-100">
                </div>

                {{-- Isi Berita --}}
                <div class="md:col-span-2">
                    <label class="block text-sm font-semibold text-gray-700 mb-1">
                        Isi Berita
                    </label>
                    <textarea
                        name="isi"
                        rows="12"
                        required
                        class="w-full rounded-lg border border-gray-300 px-4 py-2.5 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">{{ old('isi') }}</textarea>
                </div>

                {{-- Status --}}
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1">
                        Status
                    </label>
                    <select
                        name="status"
                        class="w-full rounded-lg border border-gray-300 px-4 py-2.5 bg-white focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                        <option value="publish">Publish</option>
                        <option value="draft">Draft</option>
                    </select>
                </div>

            </div>

            {{-- Footer --}}
            <div class="mt-8 pt-6 border-t border-gray-100 flex gap-3">

                <button
                    type="submit"
                    class="px-6 py-2.5 rounded-lg bg-blue-800 text-white font-semibold hover:bg-blue-900 transition">
                    Simpan Berita
                </button>

                <a
                    href="{{ route('admin.berita.index') }}"
                    class="px-6 py-2.5 rounded-lg bg-gray-100 text-gray-700 font-semibold hover:bg-gray-200 transition">
                    Batal
                </a>

            </div>

        </div>

    </form>

</div>

@endsection