@extends('admin.layouts.app')

@section('title', 'Edit Prestasi')
@section('page-title', 'Edit Prestasi')

@section('content')

<div class="p-8">
    <div class="mb-8">
        <a href="{{ route('admin.profil.prestasi.index') }}"
           class="mb-4 inline-flex items-center gap-2 text-sm font-semibold text-blue-700 hover:text-blue-900">
            <svg xmlns="http://www.w3.org/2000/svg"
                 class="h-5 w-5"
                 fill="none"
                 viewBox="0 0 24 24"
                 stroke="currentColor">

                <path stroke-linecap="round"
                      stroke-linejoin="round"
                      stroke-width="2"
                      d="M15 19l-7-7 7-7"/>
            </svg>
            Kembali ke Prestasi
        </a>

        <h1 class="text-3xl font-bold text-blue-800">
            Edit Prestasi
        </h1>

        <p class="mt-1 text-gray-500">
            Perbarui informasi prestasi Desa Jatisari.
        </p>
    </div>

    <form action="{{ route('admin.profil.prestasi.update', $prestasi->id) }}"
          method="POST"
          enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="grid grid-cols-1 gap-8 lg:grid-cols-3">
            <div class="lg:col-span-1">
                <div class="rounded-2xl border border-gray-200 bg-white p-6 shadow-sm">
                    <h2 class="text-lg font-bold text-gray-800">
                        Foto Prestasi
                    </h2>

                    <p class="mt-1 text-sm text-gray-500">
                        Ganti foto jika diperlukan.
                    </p>

                    <div class="mt-5 overflow-hidden rounded-xl border border-gray-200 bg-gray-50">
                        @if($prestasi->foto)
                            <img id="preview-image"
                                 src="{{ asset('storage/' . $prestasi->foto) }}"
                                 alt="{{ $prestasi->nama }}"
                                 class="h-64 w-full object-cover">
                        @else
                            <img id="preview-image"
                                 src="#"
                                 alt="Preview"
                                 class="hidden h-64 w-full object-cover">

                            <div id="preview-placeholder"
                                 class="flex h-64 flex-col items-center justify-center text-gray-400">
                                <svg xmlns="http://www.w3.org/2000/svg"
                                     class="h-14 w-14"
                                     fill="none"
                                     viewBox="0 0 24 24"
                                     stroke="currentColor">

                                    <path stroke-linecap="round"
                                          stroke-linejoin="round"
                                          stroke-width="1.5"
                                          d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                </svg>

                                <span class="mt-2 text-sm">
                                    Belum ada foto
                                </span>
                            </div>
                        @endif
                    </div>

                    <label class="mt-5 block">
                        <span class="mb-2 block text-sm font-semibold text-gray-700">
                            Ganti Foto
                        </span>

                        <input type="file"
                               name="foto"
                               id="foto"
                               accept="image/*"
                               onchange="previewFoto(event)"
                               class="block w-full cursor-pointer rounded-xl border border-gray-300 bg-white text-sm text-gray-600 file:mr-4 file:border-0 file:bg-blue-50 file:px-4 file:py-3 file:font-semibold file:text-blue-700 hover:file:bg-blue-100">
                    </label>

                    @error('foto')
                        <p class="mt-2 text-sm text-red-600">
                            {{ $message }}
                        </p>
                    @enderror

                    <p class="mt-2 text-xs text-gray-400">
                        Kosongkan jika ingin menggunakan foto lama.
                    </p>
                </div>
            </div>

            <div class="lg:col-span-2">
                <div class="rounded-2xl border border-gray-200 bg-white p-6 shadow-sm">
                    <h2 class="mb-6 text-lg font-bold text-gray-800">
                        Informasi Prestasi
                    </h2>

                    <div class="mb-5">
                        <label for="nama"
                               class="mb-2 block text-sm font-semibold text-gray-700">
                            Nama Prestasi
                        </label>

                        <input type="text"
                               name="nama"
                               id="nama"
                               value="{{ old('nama', $prestasi->nama) }}"
                               class="w-full rounded-xl border border-gray-300 px-4 py-3 outline-none transition focus:border-blue-500 focus:ring-2 focus:ring-blue-100"
                               required>

                        @error('nama')
                            <p class="mt-2 text-sm text-red-600">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <div class="mb-5">
                        <label for="tanggal"
                               class="mb-2 block text-sm font-semibold text-gray-700">
                            Tanggal
                        </label>

                        <input type="date"
                               name="tanggal"
                               id="tanggal"
                               value="{{ old('tanggal', $prestasi->tanggal ? \Carbon\Carbon::parse($prestasi->tanggal)->format('Y-m-d') : '') }}"
                               onchange="setHari(this.value)"
                               class="w-full rounded-xl border border-gray-300 px-4 py-3 outline-none transition focus:border-blue-500 focus:ring-2 focus:ring-blue-100"
                               required>

                        @error('tanggal')
                            <p class="mt-2 text-sm text-red-600">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <div class="mb-5">
                        <label for="hari"
                               class="mb-2 block text-sm font-semibold text-gray-700">
                            Hari
                        </label>
                        <input type="text"
                               name="hari"
                               id="hari"
                               value="{{ old('hari', $prestasi->hari) }}"
                               readonly
                               class="w-full cursor-not-allowed rounded-xl border border-gray-300 bg-gray-50 px-4 py-3 text-gray-600">

                        @error('hari')
                            <p class="mt-2 text-sm text-red-600">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <div>
                        <label for="keterangan"
                               class="mb-2 block text-sm font-semibold text-gray-700">
                            Keterangan
                        </label>

                        <textarea name="keterangan"
                                  id="keterangan"
                                  rows="6"
                                  class="w-full resize-none rounded-xl border border-gray-300 px-4 py-3 outline-none transition focus:border-blue-500 focus:ring-2 focus:ring-blue-100"
                                  required>{{ old('keterangan', $prestasi->keterangan) }}</textarea>

                        @error('keterangan')
                            <p class="mt-2 text-sm text-red-600">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>
                </div>

                <div class="mt-6 flex justify-end gap-3">
                    <a href="{{ route('admin.profil.prestasi.index') }}"
                       class="rounded-xl border border-gray-300 bg-white px-6 py-3 font-semibold text-gray-600 transition hover:bg-gray-50">
                        Batal
                    </a>

                    <button type="submit"
                            class="rounded-xl bg-blue-700 px-6 py-3 font-semibold text-white shadow-md transition hover:bg-blue-800">

                        Simpan Perubahan

                    </button>
                </div>
            </div>
        </div>
    </form>
</div>

<script>
function previewFoto(event) {

    const input = event.target;
    const image = document.getElementById('preview-image');

    if (input.files && input.files[0]) {
        const reader = new FileReader();
        reader.onload = function(e) {
            image.src = e.target.result;
            image.classList.remove('hidden');

            const placeholder =
                document.getElementById('preview-placeholder');

            if (placeholder) {
                placeholder.classList.add('hidden');
            }
        };
        reader.readAsDataURL(input.files[0]);
    }
}

function setHari(tanggal) {
    if (!tanggal) {
        return;
    }
    const date = new Date(tanggal + 'T00:00:00');
    const hari = [
        'Minggu',
        'Senin',
        'Selasa',
        'Rabu',
        'Kamis',
        'Jumat',
        'Sabtu'
    ];
    document.getElementById('hari').value = hari[date.getDay()];
}

document.addEventListener('DOMContentLoaded', function () {
    const tanggal = document.getElementById('tanggal').value;
    if (tanggal) {
        setHari(tanggal);
    }
});
</script>
@endsection