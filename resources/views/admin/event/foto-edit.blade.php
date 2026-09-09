@extends('admin.layouts.app')

@section('title', 'Edit Foto Event')
@section('page-title', 'Edit Foto Event')

@section('content')
<div class="p-8">
    <div class="mb-6 flex flex-wrap items-center justify-between gap-4">
        <div>
            <h1 class="text-2xl font-bold text-blue-900">Edit Foto Event</h1>
            <p class="mt-1 text-gray-500">Ganti foto dokumentasi {{ $event->judul }}.</p>
        </div>

        <a href="{{ route('admin.event.edit', $event) }}"
           class="rounded-lg bg-gray-200 px-4 py-2 font-semibold text-gray-800 hover:bg-gray-300">
            &larr; Kembali
        </a>
    </div>

    @if($errors->any())
        <div class="mb-6 rounded-lg border border-red-200 bg-red-50 p-4 text-red-700">
            @foreach($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        </div>
    @endif

    <div class="max-w-xl rounded-xl bg-white p-6 shadow-md">
        <img src="{{ asset('storage/' . $foto->foto) }}" alt="{{ $event->judul }}" class="mb-5 h-64 w-full rounded-lg object-cover">

        <form action="{{ route('admin.event.foto.update', [$event, $foto]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <label class="mb-2 block text-sm font-medium text-gray-700">Pilih Foto Baru</label>
            <input type="file" name="foto" accept="image/*" required
                   class="w-full rounded-lg border border-gray-300 px-4 py-2.5 file:mr-3 file:rounded file:border-0 file:bg-blue-800 file:px-4 file:py-2 file:text-white">
            <p class="mt-2 text-sm text-gray-500">Maksimal 4 MB per foto.</p>

            <button type="submit" class="mt-6 rounded-lg bg-blue-800 px-5 py-2.5 font-semibold text-white hover:bg-blue-900">
                Simpan Foto
            </button>
        </form>
    </div>
</div>
@endsection
