@extends('admin.layouts.app')

@section('title', 'Prestasi Desa')
@section('page-title', 'Prestasi Desa')

@section('content')

<div class="p-8">
    <div class="mb-8 flex flex-wrap items-center justify-between gap-4">
        <div>
            <h1 class="text-3xl font-bold text-blue-800">
                Prestasi Desa
            </h1>

            <p class="mt-1 text-gray-500">
                Kelola data prestasi dan penghargaan Desa Jatisari.
            </p>
        </div>

        <div class="flex items-center gap-3">
            <a href="{{ route('admin.profil.index') }}"
               class="inline-flex items-center gap-2 rounded-xl bg-gray-500 px-5 py-3 font-semibold text-white shadow-md transition hover:bg-gray-600">
                <svg xmlns="http://www.w3.org/2000/svg"
                     class="h-5 w-5"
                     fill="none"
                     viewBox="0 0 24 24"
                     stroke="currentColor">
                    <path stroke-linecap="round"
                          stroke-linejoin="round"
                          stroke-width="2"
                          d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                </svg>
                Kembali
            </a>

            <a href="{{ route('admin.profil.prestasi.create') }}"
               class="inline-flex items-center gap-2 rounded-xl bg-blue-700 px-5 py-3 font-semibold text-white shadow-md transition hover:bg-blue-800">
                <svg xmlns="http://www.w3.org/2000/svg"
                     class="h-5 w-5"
                     fill="none"
                     viewBox="0 0 24 24"
                     stroke="currentColor">
                    <path stroke-linecap="round"
                          stroke-linejoin="round"
                          stroke-width="2"
                          d="M12 4v16m8-8H4"/>
                </svg>
                Tambah Prestasi
            </a>
        </div>
    </div>

    @if(session('success'))
        <div class="mb-6 rounded-xl border border-green-200 bg-green-50 px-5 py-4 text-green-700">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="mb-6 rounded-xl border border-red-200 bg-red-50 px-5 py-4 text-red-700">
            {{ session('error') }}
        </div>
    @endif

    @if($errors->any())
        <div class="mb-6 rounded-xl border border-red-200 bg-red-50 p-5">
            <p class="mb-2 font-semibold text-red-700">
                Terjadi kesalahan:
            </p>

            <ul class="list-inside list-disc text-red-600">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if($prestasis->count())
        <div class="grid grid-cols-1 gap-6 md:grid-cols-2 xl:grid-cols-3">
            @foreach($prestasis as $prestasi)
                <div class="group overflow-hidden rounded-2xl border border-gray-200 bg-white shadow-sm transition duration-300 hover:-translate-y-1 hover:shadow-xl">
                    <div class="relative h-56 overflow-hidden bg-gray-100">

                        @if($prestasi->foto)
                            <img
                                src="{{ asset('storage/' . $prestasi->foto) }}"
                                alt="{{ $prestasi->nama }}"
                                class="h-full w-full object-cover transition duration-500 group-hover:scale-105"
                            >
                        @else

                            <div class="flex h-full w-full flex-col items-center justify-center text-gray-400">
                                <svg xmlns="http://www.w3.org/2000/svg"
                                     class="mb-2 h-12 w-12"
                                     fill="none"
                                     viewBox="0 0 24 24"
                                     stroke="currentColor">

                                    <path stroke-linecap="round"
                                          stroke-linejoin="round"
                                          stroke-width="1.5"
                                          d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                </svg>

                                <span class="text-sm">
                                    Tidak ada foto
                                </span>
                            </div>
                        @endif
                    </div>

                    <div class="p-5">
                        <h2 class="line-clamp-2 text-xl font-bold text-gray-800">
                            {{ $prestasi->nama }}
                        </h2>

                        <div class="mt-3 flex flex-wrap gap-2">
                            <span class="inline-flex items-center gap-1.5 rounded-lg bg-blue-50 px-3 py-1.5 text-sm font-medium text-blue-700">
                                <svg xmlns="http://www.w3.org/2000/svg"
                                     class="h-4 w-4"
                                     fill="none"
                                     viewBox="0 0 24 24"
                                     stroke="currentColor">

                                    <path stroke-linecap="round"
                                          stroke-linejoin="round"
                                          stroke-width="2"
                                          d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                </svg>
                                {{ \Carbon\Carbon::parse($prestasi->tanggal)->translatedFormat('d F Y') }}
                            </span>

                            <span class="rounded-lg bg-gray-100 px-3 py-1.5 text-sm font-medium text-gray-600">
                                {{ $prestasi->hari }}
                            </span>
                        </div>

                        <p class="mt-4 line-clamp-3 text-sm leading-6 text-gray-600">
                            {{ $prestasi->keterangan }}
                        </p>

                        <div class="mt-5 flex gap-2 border-t border-gray-100 pt-4">
                            <a href="{{ route('admin.profil.prestasi.edit', $prestasi->id) }}"
                               class="flex flex-1 items-center justify-center gap-2 rounded-xl bg-yellow-50 px-4 py-2.5 text-sm font-semibold text-yellow-700 transition hover:bg-yellow-100">
                                <svg xmlns="http://www.w3.org/2000/svg"
                                     class="h-4 w-4"
                                     fill="none"
                                     viewBox="0 0 24 24"
                                     stroke="currentColor">

                                    <path stroke-linecap="round"
                                          stroke-linejoin="round"
                                          stroke-width="2"
                                          d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.5-8.5a2.121 2.121 0 013 3L12 15l-4 1 1-4 7.5-7.5z"/>
                                </svg>
                                Edit
                            </a>

                            <form action="{{ route('admin.profil.prestasi.destroy', $prestasi->id) }}"
                                  method="POST"
                                  class="flex-1"
                                  onsubmit="return confirm('Yakin ingin menghapus prestasi ini?')">
                                @csrf
                                @method('DELETE')

                                <button type="submit"
                                        class="flex w-full items-center justify-center gap-2 rounded-xl bg-red-50 px-4 py-2.5 text-sm font-semibold text-red-600 transition hover:bg-red-100">
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                         class="h-4 w-4"
                                         fill="none"
                                         viewBox="0 0 24 24"
                                         stroke="currentColor">

                                        <path stroke-linecap="round"
                                              stroke-linejoin="round"
                                              stroke-width="2"
                                              d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6M9 7V4a1 1 0 011-1h4a1 1 0 011 1v3m-9 0h14"/>
                                    </svg>
                                    Hapus
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <div class="rounded-2xl border-2 border-dashed border-gray-300 bg-white py-16 text-center">
            <div class="mx-auto flex h-16 w-16 items-center justify-center text-6xl">
                🏆
            </div>

            <h3 class="mt-4 text-lg font-semibold text-gray-700">
                Belum ada prestasi
            </h3>

            <p class="mt-1 text-gray-500">
                Silakan tambahkan data prestasi desa.
            </p>
        </div>
    @endif
</div>
@endsection