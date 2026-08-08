@extends('admin.layouts.app')

@section('title', 'Detail Aspirasi')
@section('page-title', 'Detail Aspirasi')

@section('content')
<div class="p-8 max-w-3xl">

    <a href="{{ route('admin.aspirasi.index') }}" class="text-green-700 font-semibold mb-4 inline-block">
        ← Kembali
    </a>

    <div class="bg-white rounded-xl shadow-md p-6 mt-2">

        <div class="flex justify-between items-start mb-4">
            <div>
                <h2 class="text-xl font-bold text-green-800">
                    {{ $aspirasi->nama ?: 'Anonim' }}
                </h2>
                <p class="text-gray-500 text-sm">
                    {{ $aspirasi->alamat ?: 'Alamat tidak dicantumkan' }}
                    · {{ $aspirasi->created_at->format('d M Y, H:i') }}
                </p>
            </div>

            @if($aspirasi->kategori)
                <span class="bg-green-50 text-green-700 px-3 py-1 rounded-full text-xs font-semibold">
                    {{ $aspirasi->kategori }}
                </span>
            @endif
        </div>

        <div class="border-t pt-4 mb-4">
            <h3 class="font-semibold text-gray-700 mb-2">Isi Aspirasi</h3>
            <p class="text-gray-700 whitespace-pre-line">{{ $aspirasi->isi_aspirasi }}</p>
        </div>

        @if($aspirasi->foto)
            <div class="mb-4">
                <h3 class="font-semibold text-gray-700 mb-2">Foto Pendukung</h3>
                <img src="{{ Storage::url($aspirasi->foto) }}"
                     alt="Foto pendukung"
                     class="rounded-lg max-h-96 object-cover">
            </div>
        @endif

        <div class="border-t pt-4 flex items-center justify-between">

            <form action="{{ route('admin.aspirasi.update', $aspirasi->id) }}" method="POST" class="flex items-center gap-2">
                @csrf
                @method('PUT')

                <label class="text-sm text-gray-600">Status:</label>
                <select name="status" onchange="this.form.submit()" class="border rounded-lg px-3 py-2">
                    <option value="baru" {{ $aspirasi->status == 'baru' ? 'selected' : '' }}>Baru</option>
                    <option value="diproses" {{ $aspirasi->status == 'diproses' ? 'selected' : '' }}>Diproses</option>
                    <option value="selesai" {{ $aspirasi->status == 'selesai' ? 'selected' : '' }}>Selesai</option>
                </select>
            </form>

            <form action="{{ route('admin.aspirasi.destroy', $aspirasi->id) }}" method="POST"
                  onsubmit="return confirm('Yakin hapus aspirasi ini?')">
                @csrf
                @method('DELETE')

                <button type="submit" class="text-red-600 font-semibold hover:underline">
                    🗑 Hapus
                </button>
            </form>

        </div>

    </div>

</div>
@endsection