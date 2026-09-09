@extends('admin.layouts.app')

@section('title', 'Peraturan Desa')
@section('page-title', 'Peraturan Desa')

@section('content')

<div class="p-8">
    <div class="mb-6 flex flex-wrap items-center justify-between gap-4">
        <div>
            <h1 class="text-3xl font-bold text-blue-900">Kelola Peraturan Desa</h1>
            <p class="mt-1 text-gray-500">Kelola judul, tahun, dan isi peraturan desa.</p>
        </div>
        <div class="flex gap-3">
            <a href="{{ route('admin.data-desa.index') }}" class="rounded-xl bg-gray-200 px-5 py-3 font-semibold text-gray-800 hover:bg-gray-300">Kembali</a>
            <a href="{{ route('admin.data-desa.peraturan.create') }}" class="rounded-xl bg-blue-700 px-5 py-3 font-semibold text-white hover:bg-blue-800">+ Tambah Peraturan</a>
        </div>
    </div>

    @if(session('success'))
        <div class="mb-6 rounded-xl border border-green-200 bg-green-50 px-5 py-4 text-green-700">{{ session('success') }}</div>
    @endif

    <div class="grid grid-cols-1 gap-6 md:grid-cols-2 xl:grid-cols-3">
        @forelse($peraturans as $peraturan)
            <article class="rounded-2xl border border-slate-200 bg-slate-800 p-5 text-white shadow-md">
                <div class="mb-5 flex h-36 items-center justify-center rounded-xl bg-slate-100 text-5xl">📜</div>
                <span class="inline-block rounded-full bg-slate-600 px-3 py-1 text-xs font-semibold">{{ $peraturan->tahun }}</span>
                <h2 class="mt-3 text-xl font-bold">{{ $peraturan->judul }}</h2>
                <p class="mt-2 line-clamp-3 text-sm text-slate-200">{{ $peraturan->isi }}</p>
                <div class="mt-5 flex gap-2 border-t border-slate-600 pt-4">
                    <a href="{{ route('admin.data-desa.peraturan.edit', $peraturan) }}" class="flex-1 rounded-lg bg-amber-100 px-3 py-2 text-center text-sm font-semibold text-amber-800 hover:bg-amber-200">Edit</a>
                    <form action="{{ route('admin.data-desa.peraturan.destroy', $peraturan) }}" method="POST" class="flex-1" onsubmit="return confirm('Hapus peraturan ini?')">
                        @csrf
                        @method('DELETE')
                        <button class="w-full rounded-lg bg-red-100 px-3 py-2 text-sm font-semibold text-red-700 hover:bg-red-200">Hapus</button>
                    </form>
                </div>
            </article>
        @empty
            <div class="col-span-full rounded-2xl bg-white p-12 text-center text-gray-500 shadow-md">Belum ada peraturan desa.</div>
        @endforelse
    </div>

</div>

@endsection