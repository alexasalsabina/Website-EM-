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
                <label class="block text-sm font-medium text-gray-700 mb-2">Foto Event</label>

                @if($event->fotos->isNotEmpty())
                    <div class="mb-3 grid grid-cols-2 gap-3 sm:grid-cols-4">
                        @foreach($event->fotos as $foto)
                            <div>
                                <img src="{{ asset('storage/' . $foto->foto) }}"
                                     alt="{{ $event->judul }}"
                                     class="h-24 w-full rounded-lg object-cover">
                                <div class="mt-2 flex items-center justify-between text-xs">
                                    <a href="{{ route('admin.event.foto.edit', [$event, $foto]) }}" class="font-semibold text-blue-800 hover:underline">Edit</a>
                                    <button type="submit" form="delete-foto-{{ $foto->id }}"
                                            onclick="return confirm('Hapus foto ini?');"
                                            class="font-semibold text-red-600 hover:underline">Hapus</button>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif

                  <input type="file" name="foto[]" accept="image/*" multiple
                      id="eventPhotoInput" data-max-files="{{ 50 - $event->fotos->count() }}"
                       class="w-full rounded-lg border border-gray-300 px-4 py-2.5 file:mr-3 file:rounded file:border-0 file:bg-blue-800 file:px-4 file:py-2 file:text-white">
                <p class="mt-2 text-sm text-gray-500">
                    {{ 50 - $event->fotos->count() }} slot foto tersisa. Pilih maksimal 50 foto secara keseluruhan, maksimal 4 MB per foto.
                </p>
                  <p id="eventPhotoCount" class="mt-1 text-sm font-semibold text-blue-800"></p>
                <p id="eventPhotoNames" class="mt-1 text-xs text-gray-500"></p>
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

    {{-- Form hapus foto DISEMBUNYIKAN di sini, di luar form utama. Tombol "Hapus" di atas terhubung via attribute form="..." --}}
    @foreach($event->fotos as $foto)
        <form id="delete-foto-{{ $foto->id }}" action="{{ route('admin.event.foto.destroy', [$event, $foto]) }}" method="POST" class="hidden">
            @csrf
            @method('DELETE')
        </form>
    @endforeach

</div>

@push('scripts')
<script>
    (() => {
        const input = document.getElementById('eventPhotoInput');
        if (!input) return;
        const countMessage = document.getElementById('eventPhotoCount');
        const namesMessage = document.getElementById('eventPhotoNames');
        const maxFiles = Number(input.dataset.maxFiles);
        let selectedFiles = [];

        input.addEventListener('change', () => {
            const incomingFiles = Array.from(input.files);
            const knownFiles = new Set(selectedFiles.map((file) => `${file.name}-${file.size}-${file.lastModified}`));
            const newFiles = incomingFiles.filter((file) => !knownFiles.has(`${file.name}-${file.size}-${file.lastModified}`));
            selectedFiles = [...selectedFiles, ...newFiles];

            if (selectedFiles.length > maxFiles) {
                selectedFiles = selectedFiles.slice(0, maxFiles);
                alert(`Maksimal ${maxFiles} foto yang dapat dipilih.`);
            }

            const dataTransfer = new DataTransfer();
            selectedFiles.forEach((file) => dataTransfer.items.add(file));
            input.files = dataTransfer.files;
            countMessage.textContent = `${selectedFiles.length} foto dipilih untuk diunggah.`;
            namesMessage.textContent = selectedFiles.map((file) => file.name).join(', ');
        });
    })();
</script>
@endpush
@endsection