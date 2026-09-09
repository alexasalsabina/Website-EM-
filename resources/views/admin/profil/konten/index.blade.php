@extends('admin.layouts.app')

@section('title', ucfirst($kategori))
@section('page-title', ucfirst($kategori))

@section('content')
<div class="p-8">
    <div class="mb-6 flex flex-wrap items-center justify-between gap-4">
        <div><h1 class="text-3xl font-bold text-blue-900">Kelola {{ ucfirst($kategori) }}</h1><p class="mt-1 text-gray-500">Kelola foto, judul, dan keterangan.</p></div>
        <div class="flex gap-3"><a href="{{ route('admin.profil.index') }}" class="rounded-xl bg-gray-200 px-5 py-3 font-semibold text-gray-800">Kembali</a>@if($kategori === 'potensi' || $konten->count() < 3)<a href="{{ route('admin.profil.konten.create', $kategori) }}" class="rounded-xl bg-blue-700 px-5 py-3 font-semibold text-white">+ Tambah</a>@endif</div>
    </div>
    @if(session('success'))<div class="mb-6 rounded-xl bg-green-50 p-4 text-green-700">{{ session('success') }}</div>@endif
    <div class="grid grid-cols-1 gap-6 md:grid-cols-3">
        @forelse($konten as $item)
            <article class="overflow-hidden rounded-2xl bg-white shadow-md">
                <div class="h-48 bg-slate-100">@if($item->foto)<img src="{{ asset('storage/' . $item->foto) }}" alt="{{ $item->judul }}" class="h-full w-full object-cover">@else<div class="flex h-full items-center justify-center text-5xl">🖼️</div>@endif</div>
                <div class="p-5"><h2 class="text-xl font-bold text-gray-800">{{ $item->judul }}</h2><p class="mt-2 line-clamp-4 text-sm leading-6 text-gray-600">{{ $item->isi }}</p><div class="mt-5 flex gap-2 border-t pt-4"><a href="{{ route('admin.profil.konten.edit', [$kategori, $item]) }}" class="flex-1 rounded-lg bg-amber-50 px-3 py-2 text-center text-sm font-semibold text-amber-800">Edit</a><form action="{{ route('admin.profil.konten.destroy', [$kategori, $item]) }}" method="POST" class="flex-1" onsubmit="return confirm('Hapus data ini?')">@csrf @method('DELETE')<button class="w-full rounded-lg bg-red-50 px-3 py-2 text-sm font-semibold text-red-700">Hapus</button></form></div></div>
            </article>
        @empty
            <div class="col-span-full rounded-2xl bg-white p-12 text-center text-gray-500">Belum ada data {{ $kategori }}.</div>
        @endforelse
    </div>
</div>
@endsection
