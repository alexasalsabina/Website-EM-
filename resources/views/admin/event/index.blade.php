@extends('admin.layouts.app')

@section('title', 'Kelola Event')
@section('page-title', 'Event')

@section('content')
<div class="p-8">

    <div class="mb-6 flex flex-wrap items-start justify-between gap-4">
        <div>
            <h1 class="text-2xl font-bold text-blue-900">Kelola Event</h1>
            <p class="text-gray-500 mt-1">
                Tambah, edit, dan hapus event kegiatan Desa Jatisari.
            </p>
        </div>

        <a href="{{ route('admin.event.create') }}"
           class="bg-blue-800 text-white px-4 py-2 rounded-lg font-semibold hover:bg-blue-900 transition whitespace-nowrap">
            + Tambah Event
        </a>
    </div>

    @if(session('success'))
        <div class="mb-6 rounded-lg border border-green-200 bg-green-50 p-4 text-green-700">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('admin.event.index') }}" method="GET" class="flex items-center gap-3 mb-6">
        <input type="text"
               name="search"
               value="{{ request('search') }}"
               placeholder="Cari event..."
               class="flex-1 border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-800">
        <button type="submit"
                class="bg-blue-800 text-white px-6 py-2 rounded-lg font-semibold hover:bg-blue-900 transition">
            Cari
        </button>
    </form>

    <div class="bg-white rounded-xl shadow-md p-6">
        @forelse($events as $event)
            <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-6">
                @foreach($events as $event)
                    <div class="bg-white border border-gray-100 rounded-xl shadow-sm overflow-hidden hover:shadow-lg transition duration-300">
                        <div class="h-44 bg-gray-100 flex items-center justify-center overflow-hidden">
                            <img src="{{ $event->thumbnail ? asset('storage/' . $event->thumbnail) : asset('images/default-event.jpg') }}"
                                 alt="{{ $event->judul }}"
                                 class="w-full h-full object-cover">
                        </div>

                        <div class="p-5">
                            <div class="mb-3">
                                <span class="inline-block bg-blue-100 text-blue-800 text-xs font-semibold px-3 py-1 rounded-full">
                                    Event Desa
                                </span>
                            </div>

                            <h3 class="text-lg font-bold text-gray-800 mb-2">{{ $event->judul }}</h3>

                            <ul class="text-sm text-gray-600 space-y-1 mb-4">
                                <li>📅 {{ $event->tanggal->translatedFormat('d F Y') }}</li>
                                <li>⏰ {{ $event->waktu }}</li>
                                <li>📍 {{ $event->lokasi }}</li>
                            </ul>

                            <p class="text-sm text-gray-600 mb-5 line-clamp-3">
                                {{ $event->deskripsi }}
                            </p>

                            <div class="flex items-center justify-between border-t pt-3">
                                <a href="{{ route('admin.event.edit', $event->id) }}"
                                   class="text-blue-800 font-semibold hover:underline text-sm">
                                    ✏️ Edit
                                </a>

                                <form action="{{ route('admin.event.destroy', $event->id) }}"
                                      method="POST"
                                      onsubmit="return confirm('Yakin ingin menghapus event &quot;{{ $event->judul }}&quot;? Tindakan ini tidak bisa dibatalkan.');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                            class="text-red-600 font-semibold hover:underline text-sm">
                                        🗑️ Hapus
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @empty
            <div class="flex flex-col items-center justify-center py-16 text-center">
                <div class="w-16 h-16 rounded-2xl bg-purple-100 flex items-center justify-center text-3xl mb-4">
                    🎉
                </div>
                <h3 class="text-lg font-bold text-gray-800 mb-1">Belum ada event</h3>
                <p class="text-gray-500">Silakan tambahkan event pertama.</p>
            </div>
        @endforelse
    </div>

</div>
@endsection