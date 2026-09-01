@extends('admin.layouts.app')

@section('title', 'Edit Statistik - ' . $judulKategori)
@section('page-title', 'Edit Statistik')

@section('content')
<div class="p-8">

    <div class="mb-6">
        <h1 class="text-2xl font-bold text-blue-800">Edit Statistik: {{ $judulKategori }}</h1>
        <p class="mt-1 text-gray-500">Masukkan jumlah untuk setiap kategori, lalu simpan.</p>
    </div>

    @if($errors->any())
        <div class="mb-6 rounded-xl border border-red-200 bg-red-50 p-5">
            <ul class="list-inside list-disc text-red-600">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="rounded-2xl bg-white p-6 shadow-md">
        <form action="{{ route('admin.data-desa.statistik.update', $kategori) }}" method="POST">
            @csrf
            @method('PUT')

            <div id="baris-statistik" class="space-y-3">
                @forelse($items as $item)
                    <div class="flex items-center gap-3 baris-item">
                        <input type="text" name="label[]" value="{{ $item->label }}"
                               placeholder="Nama kategori, misal: SD"
                               class="flex-1 rounded-lg border border-gray-300 px-4 py-2.5 focus:outline-none focus:ring-2 focus:ring-blue-600">

                        <input type="number" name="jumlah[]" value="{{ $item->jumlah }}" min="0"
                               placeholder="Jumlah"
                               class="w-40 rounded-lg border border-gray-300 px-4 py-2.5 focus:outline-none focus:ring-2 focus:ring-blue-600">

                        <button type="button" onclick="this.closest('.baris-item').remove()"
                                class="rounded-lg px-3 py-2.5 text-red-600 transition hover:bg-red-50">
                            🗑️
                        </button>
                    </div>
                @empty
                    <div class="flex items-center gap-3 baris-item">
                        <input type="text" name="label[]" value=""
                               placeholder="Nama kategori, misal: Dusun Krajan"
                               class="flex-1 rounded-lg border border-gray-300 px-4 py-2.5 focus:outline-none focus:ring-2 focus:ring-blue-600">

                        <input type="number" name="jumlah[]" value="0" min="0"
                               placeholder="Jumlah"
                               class="w-40 rounded-lg border border-gray-300 px-4 py-2.5 focus:outline-none focus:ring-2 focus:ring-blue-600">

                        <button type="button" onclick="this.closest('.baris-item').remove()"
                                class="rounded-lg px-3 py-2.5 text-red-600 transition hover:bg-red-50">
                            🗑️
                        </button>
                    </div>
                @endforelse
            </div>

            <button type="button" id="tombol-tambah-baris"
                    class="mt-4 inline-flex items-center gap-2 rounded-lg border border-dashed border-blue-300 px-4 py-2.5 text-sm font-semibold text-blue-700 transition hover:bg-blue-50">
                + Tambah Baris
            </button>

            <div class="mt-6 flex justify-end gap-3 border-t border-gray-100 pt-5">
                <a href="{{ route('admin.data-desa.statistik') }}"
                   class="rounded-lg border border-gray-300 px-5 py-2.5 font-semibold text-gray-600 transition hover:bg-gray-50">
                    Batal
                </a>
                <button type="submit"
                        class="rounded-lg bg-blue-700 px-6 py-2.5 font-semibold text-white transition hover:bg-blue-800">
                    Simpan
                </button>
            </div>
        </form>
    </div>

</div>

<script>
    document.getElementById('tombol-tambah-baris').addEventListener('click', function () {
        const wrapper = document.getElementById('baris-statistik');
        const baris = document.createElement('div');
        baris.className = 'flex items-center gap-3 baris-item';
        baris.innerHTML = `
            <input type="text" name="label[]" value=""
                   placeholder="Nama kategori"
                   class="flex-1 rounded-lg border border-gray-300 px-4 py-2.5 focus:outline-none focus:ring-2 focus:ring-blue-600">
            <input type="number" name="jumlah[]" value="0" min="0"
                   placeholder="Jumlah"
                   class="w-40 rounded-lg border border-gray-300 px-4 py-2.5 focus:outline-none focus:ring-2 focus:ring-blue-600">
            <button type="button" onclick="this.closest('.baris-item').remove()"
                    class="rounded-lg px-3 py-2.5 text-red-600 transition hover:bg-red-50">
                🗑️
            </button>
        `;
        wrapper.appendChild(baris);
    });
</script>
@endsection