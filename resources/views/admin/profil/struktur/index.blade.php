@extends('admin.layouts.app')

@section('title', 'Struktur Pemerintahan')
@section('page-title', 'Struktur Pemerintahan')

@section('content')
<div class="p-8">

    {{-- HEADER --}}
    <div class="mb-6 flex flex-wrap items-center justify-between gap-4">
        <div>
            <h1 class="text-2xl font-bold text-blue-800">
                Struktur Pemerintahan
            </h1>

            <p class="text-gray-500 mt-1">
                Kelola perangkat desa, urutan tampil, status aktif, dan keterangan jabatan.
            </p>
        </div>

        {{-- TOMBOL TAMBAH --}}
        <div class="flex items-center gap-3">
            <a href="{{ route('admin.profil.index') }}"
               class="bg-gray-500 text-white px-4 py-2 rounded-lg font-semibold
                      hover:bg-gray-600 transition">
                ← Kembali
            </a>

            <a href="{{ route('admin.profil.struktur.create') }}"
            class="bg-blue-700 text-white px-4 py-2 rounded-lg font-semibold
                    hover:bg-blue-800 transition">
                + Tambah Perangkat Desa
            </a>
        </div>


    {{-- ALERT SUCCESS --}}
    @if(session('success'))
        <div class="mb-6 rounded-lg border border-green-200 bg-green-50 p-4 text-green-700">
            {{ session('success') }}
        </div>
    @endif


    {{-- JIKA BELUM ADA DATA --}}
    @if($perangkatDesas->isEmpty())

        <div class="bg-white rounded-xl shadow-md p-12 text-center">

            <div class="text-5xl mb-4">
                🏛️
            </div>

            <h3 class="text-lg font-semibold text-gray-700 mb-1">
                Belum ada perangkat desa
            </h3>

            <p class="text-gray-500">
                Tambahkan data perangkat desa pertama untuk menampilkan struktur pemerintahan.
            </p>

        </div>

    @else

        {{-- DAFTAR PERANGKAT DESA --}}
        <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-6">

            @foreach($perangkatDesas as $pegawai)

                <div class="bg-white rounded-xl shadow-md overflow-hidden
                            hover:shadow-xl transition duration-300">

                    {{-- FOTO --}}
                    <div class="h-48 bg-gray-100 overflow-hidden">

                        @if($pegawai->foto)

                            <img src="{{ asset('storage/' . $pegawai->foto) }}"
                                 alt="{{ $pegawai->nama }}"
                                 class="w-full h-full object-cover">

                        @else

                            <div class="flex h-full items-center justify-center
                                        text-5xl
                                        bg-gradient-to-br from-blue-100 to-blue-200
                                        text-blue-700">
                                👤
                            </div>

                        @endif

                    </div>


                    {{-- INFORMASI --}}
                    <div class="p-5">

                        {{-- STATUS & URUTAN --}}
                        <div class="mb-3 flex items-center justify-between gap-2">

                            <span class="inline-block rounded-full px-2.5 py-1 text-xs font-semibold
                                {{ $pegawai->status === 'aktif'
                                    ? 'bg-green-100 text-green-700'
                                    : 'bg-red-100 text-red-700' }}">

                                {{ $pegawai->status === 'aktif'
                                    ? 'Aktif'
                                    : 'Tidak Aktif' }}

                            </span>

                            <span class="text-xs font-medium text-gray-500">
                                Urutan #{{ $pegawai->urutan }}
                            </span>

                        </div>


                        {{-- NAMA --}}
                        <h3 class="text-lg font-bold text-gray-800 mb-1">
                            {{ $pegawai->nama }}
                        </h3>


                        {{-- JABATAN --}}
                        <p class="text-sm font-semibold text-blue-700 mb-2">
                            {{ $pegawai->jabatan }}
                        </p>


                        {{-- KETERANGAN --}}
                        @if($pegawai->keterangan)

                            <p class="text-sm text-gray-600 mb-4 line-clamp-3">
                                {{ $pegawai->keterangan }}
                            </p>

                        @else

                            <p class="text-sm text-gray-400 mb-4">
                                Tidak ada keterangan tambahan.
                            </p>

                        @endif


                        {{-- ACTION --}}
                        <div class="flex items-center justify-between border-t pt-3">

                            {{-- EDIT --}}
                            <a href="{{ route('admin.profil.struktur.edit', $pegawai->id) }}"
                               class="text-blue-700 font-semibold hover:underline text-sm">
                                Edit
                            </a>


                            {{-- HAPUS --}}
                            <form action="{{ route('admin.profil.struktur.destroy', $pegawai->id) }}"
                                  method="POST"
                                  onsubmit="return confirm('Apakah Anda yakin ingin menghapus perangkat desa ini?')">

                                @csrf
                                @method('DELETE')

                                <button type="submit"
                                        class="text-red-600 font-semibold hover:underline text-sm">
                                    Hapus
                                </button>

                            </form>

                        </div>

                    </div>

                </div>

            @endforeach

        </div>

    @endif

</div>
@endsection