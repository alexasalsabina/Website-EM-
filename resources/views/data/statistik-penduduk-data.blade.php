@extends('layouts.app')

@section('title', $submenuTitle)

@section('content')
    <div class="container mx-auto px-4 py-8 text-white sm:px-8">
        <h1 class="text-2xl font-bold text-white">{{ $submenuTitle }}</h1>
        <p class="mt-2 mb-6 text-white/80">Data {{ strtolower($submenuTitle) }} penduduk Desa Jatisari.</p>

        <div class="overflow-x-auto rounded-xl">
            <table class="statistik-data-table min-w-full overflow-hidden bg-white text-left text-[#08233a] shadow-sm">
                <thead class="bg-[#0b2d49] text-white">
                    <tr>
                        <th class="px-5 py-3">Keterangan</th>
                        <th class="px-5 py-3">Jumlah</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($rows as $row)
                        <tr class="border-b border-slate-200 last:border-b-0">
                            <td class="px-5 py-4">{{ $row->label }}</td>
                            <td class="px-5 py-4 font-bold">{{ number_format($row->jumlah, 0, ',', '.') }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="2" class="px-5 py-6 text-center text-gray-400">
                                Belum ada data untuk kategori ini.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <a href="{{ in_array($kategori, ['ekonomi', 'inklusi'], true) ? route('data.statistik-penduduk') : route('data.statistik-penduduk.kategori', $kategori) }}" class="mt-6 inline-block font-bold text-[#9bdaf2] hover:text-white">
            &larr; {{ in_array($kategori, ['ekonomi', 'inklusi'], true) ? 'Kembali ke Statistik Penduduk' : 'Kembali ke pilihan statistik' }}
        </a>
    </div>
@endsection