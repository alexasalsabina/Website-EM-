@extends('admin.layouts.app')

@section('title', 'Edit Event')
@section('page-title', 'Edit Event')

@section('content')
<div class="p-8">

    <div class="mb-6 flex flex-wrap items-center justify-between gap-4">
        <div>
            <h1 class="text-2xl font-bold text-blue-900">Edit Event</h1>
            <p class="text-gray-500 mt-1">
                Perbarui detail dan informasi event Desa Jatisari.
            </p>
        </div>

        <a href="{{ route('admin.event.index') }}"
           class="bg-gray-200 text-gray-800 px-4 py-2 rounded-lg font-semibold hover:bg-gray-300 transition">
            ← Kembali
        </a>
    </div>

    @if($errors->any())
        <div class="mb-6 rounded-lg border border-red-200 bg-red-50 p-4 text-red-700">
            <ul class="list-disc pl-5 space-y-1">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.event.update', $event->id) }}" method="POST" enctype="multipart/form-data" class="bg-white rounded-xl shadow-md p-6">
        @csrf
        @method('PUT')

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div class="md:col-span-2">
                <label class="block text-sm font-medium text-gray-700 mb-2">Judul Event</label>
                <input type="text" name="judul" value="{{ old('judul', $event->judul) }}"
                       class="w-full rounded-lg border border-gray-300 px-4 py-2.5 focus:outline-none focus:ring-2 focus:ring-blue-700"
                       required>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Tanggal</label>
                <input type="date" name="tanggal" value="{{ old('tanggal', $event->tanggal->format('Y-m-d')) }}"
                       class="w-full rounded-lg border border-gray-300 px-4 py-2.5 focus:outline-none focus:ring-2 focus:ring-blue-700"
                       required>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Waktu</label>
                <input type="text" name="waktu" value="{{ old('waktu', $event->waktu) }}"
                       class="w-full rounded-lg border border-gray-300 px-4 py-2.5 focus:outline-none focus:ring-2 focus:ring-blue-700"
                       required>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Lokasi</label>
                <input type="text" name="lokasi" value="{{ old('lokasi', $event->lokasi) }}"
                       class="w-full rounded-lg border border-gray-300 px-4 py-2.5 focus:outline-none focus:ring-2 focus:ring-blue-700"
                       required>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Status</label>
                <select name="status" class="w-full rounded-lg border border-gray-300 px-4 py-2.5 focus:outline-none focus:ring-2 focus:ring-blue-700">
                    <option value="publish" {{ old('status', $event->status) == 'publish' ? 'selected' : '' }}>Publish</option>
                    <option value="draft" {{ old('status', $event->status) == 'draft' ? 'selected' : '' }}>Draft</option>
                    <option value="selesai" {{ old('status', $event->status) == 'selesai' ? 'selected' : '' }}>Selesai</option>
                </select>
            </div>

            <div class="md:col-span-2">
                <label class="block text-sm font-medium text-gray-700 mb-2">Thumbnail Event</label>

                @if($event->thumbnail)
                    <div class="mb-3">
                        <img src="{{ asset('storage/' . $event->thumbnail) }}" alt="{{ $event->judul }}" class="h-32 rounded-lg object-cover">
                    </div>
                @endif

                <input type="file" name="thumbnail" accept="image/*"
                       class="w-full rounded-lg border border-gray-300 px-4 py-2.5 file:mr-3 file:rounded file:border-0 file:bg-blue-800 file:px-4 file:py-2 file:text-white">
                <p class="mt-2 text-sm text-gray-500">Kosongkan jika tidak ingin mengganti gambar.</p>
            </div>

            <div class="md:col-span-2">
                <label class="block text-sm font-medium text-gray-700 mb-2">Deskripsi</label>
                <textarea name="deskripsi" rows="6"
                          class="w-full rounded-lg border border-gray-300 px-4 py-2.5 focus:outline-none focus:ring-2 focus:ring-blue-700"
                          required>{{ old('deskripsi', $event->deskripsi) }}</textarea>
            </div>
        </div>

        <div class="mt-8 flex items-center gap-3">
            <button type="submit"
                    class="bg-blue-800 text-white px-5 py-2.5 rounded-lg font-semibold hover:bg-blue-900 transition">
                Simpan Perubahan
            </button>

            <a href="{{ route('admin.event.index') }}"
               class="bg-gray-200 text-gray-800 px-5 py-2.5 rounded-lg font-semibold hover:bg-gray-300 transition">
                Batal
            </a>
        </div>
    </form>

</div>
@endsection