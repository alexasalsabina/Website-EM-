@extends('admin.layouts.app')

@section('title', 'Kelola Berita')
@section('page-title', 'Berita')

@section('content')
<div class="p-8">

    {{-- Header --}}
    <div class="mb-6 flex flex-wrap items-start justify-between gap-4">
        <div>
            <h1 class="text-2xl font-bold text-blue-900">Kelola Berita</h1>
            <p class="text-gray-500 mt-1">
                Tambah, edit, dan hapus berita Desa Jatisari.
            </p>
        </div>

        <a href="{{ route('admin.berita.create') }}"
           class="bg-blue-800 text-white px-4 py-2 rounded-lg font-semibold hover:bg-blue-900 transition whitespace-nowrap">
            + Tambah Berita
        </a>
    </div>

    {{-- Search --}}
    <form method="GET" class="mb-6 flex gap-2 max-w-md">
        <input
            type="text"
            name="search"
            value="{{ request('search') }}"
            placeholder="Cari berita..."
            class="flex-1 border rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-700"
        >
        <button type="submit"
                class="bg-blue-800 text-white px-5 py-2 rounded-lg font-semibold hover:bg-blue-900 transition">
            Cari
        </button>
    </form>

    {{-- Grid Card --}}
    @if($beritas->count() > 0)
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($beritas as $berita)
                <div class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-xl transition duration-300">

                    {{-- Thumbnail --}}
                    <div class="h-40 bg-gray-100 flex items-center justify-center">
                        @if($berita->thumbnail)
                            <img src="{{ asset('storage/'.$berita->thumbnail) }}"
                                 alt="{{ $berita->judul }}"
                                 class="w-full h-40 object-cover">
                        @else
                            <span class="text-5xl">📰</span>
                        @endif
                    </div>

                    <div class="p-5">

                        {{-- Status + kategori --}}
                        <div class="mb-2 flex items-center gap-2">
                            @if($berita->status == 'publish')
                                <span class="bg-blue-100 text-blue-800 text-xs font-semibold px-3 py-1 rounded-full">Publish</span>
                            @else
                                <span class="bg-gray-100 text-gray-600 text-xs font-semibold px-3 py-1 rounded-full">Draft</span>
                            @endif

                            @if($berita->kategori)
                                <span class="bg-blue-50 text-blue-600 text-xs font-semibold px-3 py-1 rounded-full">
                                    {{ $berita->kategori }}
                                </span>
                            @endif
                        </div>

                        <h3 class="font-semibold text-lg text-gray-800 mb-1 line-clamp-2">
                            {{ $berita->judul }}
                        </h3>

                        <p class="text-gray-500 text-sm mb-1">
                            ✍️ {{ $berita->penulis ?? 'Admin Desa' }}
                        </p>

                        <p class="text-gray-500 text-sm mb-4">
                            🗓 {{ $berita->created_at->format('d M Y') }}
                        </p>

                        <div class="flex items-center justify-between border-t pt-3">
                            <a href="{{ route('admin.berita.edit', $berita->id) }}"
                               class="text-blue-800 font-semibold hover:underline text-sm">
                                Edit
                            </a>

                            <form action="{{ route('admin.berita.destroy', $berita->id) }}" method="POST"
                                  onsubmit="return confirm('Apakah Anda yakin ingin menghapus berita ini?')">
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

        <div class="mt-6">
            {{ $beritas->links() }}
        </div>

    @else
        {{-- Empty state --}}
        <div class="bg-white rounded-xl shadow-md p-12 text-center">
            <div class="text-5xl mb-4">📰</div>
            <h3 class="text-lg font-semibold text-gray-700 mb-1">Belum ada berita</h3>
            <p class="text-gray-500 mb-4">Silakan tambahkan berita pertama.</p>
        </div>
    @endif

</div>
@endsection