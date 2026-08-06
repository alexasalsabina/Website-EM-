@extends('admin.layouts.app')

@section('title', 'Aspirasi Warga')
@section('page-title', 'Aspirasi Warga')

@section('content')
<div class="p-8">

    <div class="mb-6 flex flex-wrap items-center justify-between gap-4">
        <h1 class="text-2xl font-bold text-green-800">Daftar Aspirasi Warga</h1>

        <a href="{{ route('admin.aspirasi.export') }}"
           class="bg-green-700 text-white px-4 py-2 rounded-lg font-semibold hover:bg-green-800 transition">
            ⬇ Export ke Excel
        </a>
    </div>

    {{-- Filter --}}
    <form method="GET" class="mb-4 flex flex-wrap gap-3">
        <select name="status" onchange="this.form.submit()"
                class="border rounded-lg px-3 py-2">
            <option value="">Semua Status</option>
            <option value="baru" {{ request('status') == 'baru' ? 'selected' : '' }}>Baru</option>
            <option value="diproses" {{ request('status') == 'diproses' ? 'selected' : '' }}>Diproses</option>
            <option value="selesai" {{ request('status') == 'selesai' ? 'selected' : '' }}>Selesai</option>
        </select>
    </form>

    <div class="bg-white rounded-xl shadow-md overflow-x-auto">
        <table class="w-full text-left">
            <thead class="bg-green-50 text-green-800">
                <tr>
                    <th class="p-4">Tanggal</th>
                    <th class="p-4">Nama</th>
                    <th class="p-4">Kategori</th>
                    <th class="p-4">Isi Aspirasi</th>
                    <th class="p-4">Status</th>
                    <th class="p-4">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($aspirasis as $item)
                    <tr class="border-t">
                        <td class="p-4 whitespace-nowrap">{{ $item->created_at->format('d M Y') }}</td>
                        <td class="p-4">{{ $item->nama ?: 'Anonim' }}</td>
                        <td class="p-4">{{ $item->kategori ?: '-' }}</td>
                        <td class="p-4 max-w-xs truncate">{{ $item->isi_aspirasi }}</td>
                        <td class="p-4">
                            @php
                                $badge = [
                                    'baru' => 'bg-yellow-100 text-yellow-700',
                                    'diproses' => 'bg-blue-100 text-blue-700',
                                    'selesai' => 'bg-green-100 text-green-700',
                                ][$item->status] ?? 'bg-gray-100 text-gray-700';
                            @endphp
                            <span class="px-3 py-1 rounded-full text-xs font-semibold {{ $badge }}">
                                {{ ucfirst($item->status) }}
                            </span>
                        </td>
                        <td class="p-4">
                            <a href="{{ route('admin.aspirasi.show', $item->id) }}"
                               class="text-green-700 font-semibold hover:underline">
                                Lihat →
                            </a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="p-8 text-center text-gray-500">
                            Belum ada aspirasi yang masuk.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-4">
        {{ $aspirasis->links() }}
    </div>

</div>
@endsection