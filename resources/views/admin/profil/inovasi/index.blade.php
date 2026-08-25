@extends('admin.layouts.app')

@section('title', 'Inovasi Desa')
@section('page-title', 'Inovasi Desa')

@section('content')

<div class="p-8">
    <div class="mb-8 flex flex-wrap items-center justify-between gap-4">
        <div>
            <h1 class="text-3xl font-bold text-blue-800">
                Inovasi Desa
            </h1>

            <p class="mt-2 text-gray-600">
                Kelola data inovasi Desa Jatisari.
            </p>
        </div>

        <div class="flex gap-3">

            <a href="{{ route('admin.profil.index') }}"
               class="rounded-lg bg-gray-500 px-5 py-3 font-semibold text-white transition hover:bg-gray-600">
                ← Kembali
            </a>

            <a href="{{ route('admin.profil.inovasi.create') }}"
               class="rounded-lg bg-blue-700 px-5 py-3 font-semibold text-white transition hover:bg-blue-800">
                + Tambah Inovasi
            </a>
        </div>
    </div>

    @if(session('success'))
        <div class="mb-6 rounded-lg bg-green-100 px-5 py-4 text-green-800">
            {{ session('success') }}
        </div>
    @endif

    @if($inovasis->count())
        <div class="grid grid-cols-1 gap-7 md:grid-cols-2 xl:grid-cols-3">
            @foreach($inovasis as $inovasi)
                <div class="group overflow-hidden rounded-2xl bg-white shadow-md transition duration-300 hover:-translate-y-1 hover:shadow-xl">
                    <div class="relative h-56 overflow-hidden bg-gray-100">
                        @if($inovasi->gambar)
                            <img
                                src="{{ asset('storage/' . $inovasi->gambar) }}"
                                alt="{{ $inovasi->judul }}"
                                class="h-full w-full object-cover transition duration-300 group-hover:scale-105"
                            >
                        @else

                            <div class="flex h-full items-center justify-center">
                                <div class="text-center text-gray-400">
                                    <div class="mb-2 text-5xl">
                                        💡
                                    </div>

                                    <p class="text-sm">
                                        Belum ada gambar
                                    </p>
                                </div>
                            </div>
                        @endif
                    </div>

                    <div class="p-6">
                        <h2 class="mb-3 text-xl font-bold text-blue-800">
                            {{ $inovasi->judul }}
                        </h2>

                        <p class="mb-5 line-clamp-4 leading-relaxed text-gray-600">
                            {{ $inovasi->deskripsi }}
                        </p>

                        <div class="flex gap-3 border-t border-gray-100 pt-5">
                            <a
                                href="{{ route('admin.profil.inovasi.edit', $inovasi) }}"
                                class="flex-1 rounded-lg bg-yellow-500 px-4 py-3 text-center font-semibold text-white transition hover:bg-yellow-600">
                                ✏ Edit
                            </a>

                            <form
                                action="{{ route('admin.profil.inovasi.destroy', $inovasi) }}"
                                method="POST"
                                class="flex-1"
                                onsubmit="return confirm('Yakin ingin menghapus inovasi ini?')">

                                @csrf
                                @method('DELETE')

                                <button
                                    type="submit"
                                    class="w-full rounded-lg bg-red-600 px-4 py-3 font-semibold text-white transition hover:bg-red-700">
                                    🗑 Hapus
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @else

        <div class="rounded-2xl bg-white px-6 py-16 text-center shadow-md">
            <div class="mb-4 text-6xl">
                💡
            </div>

            <h2 class="text-2xl font-bold text-gray-700">
                Belum Ada Data Inovasi
            </h2>

            <p class="mt-2 text-gray-500">
                Silakan tambahkan inovasi desa terlebih dahulu.
            </p>
        </div>
    @endif
</div>
@endsection