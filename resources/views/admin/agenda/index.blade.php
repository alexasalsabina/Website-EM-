@extends('admin.layouts.app')

@section('title', 'Kelola Agenda')
@section('page-title', 'Agenda')

@section('content')
<div class="p-8">

    {{-- Header --}}
    <div class="mb-6 flex flex-wrap items-start justify-between gap-4">
        <div>
            <h1 class="text-2xl font-bold text-green-800">Kelola Agenda</h1>
            <p class="text-gray-500 mt-1">
                Tambah, edit, dan hapus agenda kegiatan Desa Jatisari.
            </p>
        </div>

        <a href="{{ route('admin.agenda.create') }}"
           class="bg-green-700 text-white px-4 py-2 rounded-lg font-semibold hover:bg-green-800 transition whitespace-nowrap">
            + Tambah Agenda
        </a>
    </div>

    {{-- Search --}}
    <form method="GET" class="mb-6 flex gap-2 max-w-md">
        <input
            type="text"
            name="search"
            value="{{ request('search') }}"
            placeholder="Cari agenda..."
            class="flex-1 border rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-green-600"
        >
        <button type="submit"
                class="bg-green-700 text-white px-5 py-2 rounded-lg font-semibold hover:bg-green-800 transition">
            Cari
        </button>
    </form>

    {{-- Grid Card --}}
    @if($agendas->count() > 0)
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($agendas as $agenda)
                <div class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-xl transition duration-300">

                    {{-- Thumbnail --}}
                    <div class="h-40 bg-gray-100 flex items-center justify-center">
                        @if($agenda->thumbnail)
                            <img src="{{ asset('storage/'.$agenda->thumbnail) }}"
                                 alt="{{ $agenda->judul }}"
                                 class="w-full h-40 object-cover">
                        @else
                            <span class="text-5xl">📅</span>
                        @endif
                    </div>

                    <div class="p-5">

                        {{-- Status badge --}}
                        <div class="mb-2">
                            @if($agenda->status == 'aktif')
                                <span class="bg-green-100 text-green-700 text-xs font-semibold px-3 py-1 rounded-full">Aktif</span>
                            @elseif($agenda->status == 'selesai')
                                <span class="bg-gray-100 text-gray-600 text-xs font-semibold px-3 py-1 rounded-full">Selesai</span>
                            @else
                                <span class="bg-red-100 text-red-600 text-xs font-semibold px-3 py-1 rounded-full">Dibatalkan</span>
                            @endif
                        </div>

                        <h3 class="font-semibold text-lg text-gray-800 mb-1 line-clamp-2">
                            {{ $agenda->judul }}
                        </h3>

                        <p class="text-gray-500 text-sm mb-1">
                            📍 {{ $agenda->lokasi }}
                        </p>

                        <p class="text-gray-500 text-sm mb-4">
                            🗓 {{ $agenda->tanggal_mulai->format('d M Y') }}
                        </p>

                        <div class="flex items-center justify-between border-t pt-3">
                            <a href="{{ route('admin.agenda.edit', $agenda->id) }}"
                               class="text-green-700 font-semibold hover:underline text-sm">
                                Edit
                            </a>

                            <form action="{{ route('admin.agenda.destroy', $agenda->id) }}" method="POST"
                                  onsubmit="return confirm('Apakah Anda yakin ingin menghapus agenda ini?')">
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
            {{ $agendas->links() }}
        </div>

    @else
        {{-- Empty state --}}
        <div class="bg-white rounded-xl shadow-md p-12 text-center">
            <div class="text-5xl mb-4">📅</div>
            <h3 class="text-lg font-semibold text-gray-700 mb-1">Belum ada agenda</h3>
            <p class="text-gray-500 mb-4">Silakan tambahkan agenda pertama.</p>
            <a href="{{ route('admin.agenda.create') }}"
               class="inline-block bg-green-700 text-white px-4 py-2 rounded-lg font-semibold hover:bg-green-800 transition">
                + Tambah Agenda
            </a>
        </div>
    @endif

</div>
@endsection