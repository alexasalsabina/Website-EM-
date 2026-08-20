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
                        @if($submenuTitle === 'Jumlah Kepala Keluarga (KK)')
                            <th class="px-5 py-3">RW</th>
                            <th class="px-5 py-3">RT</th>
                            <th class="px-5 py-3">Jumlah KK</th>
                        @else
                            <th class="px-5 py-3">Keterangan</th>
                            <th class="px-5 py-3">Jumlah</th>
                        @endif
                    </tr>
                </thead>
                <tbody>
                    @if($submenuTitle === 'Jumlah Kepala Keluarga (KK)')
                        <tr class="border-b border-slate-200">
                            <td class="px-5 py-4">RW 01</td>
                            <td class="px-5 py-4">RT 01</td>
                            <td class="px-5 py-4 font-bold">86</td>
                        </tr>
                        <tr class="border-b border-slate-200">
                            <td class="px-5 py-4">RW 01</td>
                            <td class="px-5 py-4">RT 02</td>
                            <td class="px-5 py-4 font-bold">92</td>
                        </tr>
                        <tr>
                            <td class="px-5 py-4">RW 02</td>
                            <td class="px-5 py-4">RT 01</td>
                            <td class="px-5 py-4 font-bold">78</td>
                        </tr>
                    @elseif($submenuTitle === 'Penyandang Disabilitas')
                        <tr class="border-b border-slate-200">
                            <td class="px-5 py-4">Fisik</td>
                            <td class="px-5 py-4 font-bold">18</td>
                        </tr>
                        <tr class="border-b border-slate-200">
                            <td class="px-5 py-4">Netra</td>
                            <td class="px-5 py-4 font-bold">7</td>
                        </tr>
                        <tr class="border-b border-slate-200">
                            <td class="px-5 py-4">Rungu/Wicara</td>
                            <td class="px-5 py-4 font-bold">11</td>
                        </tr>
                        <tr class="border-b border-slate-200">
                            <td class="px-5 py-4">Intelektual</td>
                            <td class="px-5 py-4 font-bold">9</td>
                        </tr>
                        <tr>
                            <td class="px-5 py-4">Mental</td>
                            <td class="px-5 py-4 font-bold">6</td>
                        </tr>
                    @elseif($submenuTitle === 'Mata Pencaharian')
                        <tr class="border-b border-slate-200">
                            <td class="px-5 py-4">Petani</td>
                            <td class="px-5 py-4 font-bold">684</td>
                        </tr>
                        <tr class="border-b border-slate-200">
                            <td class="px-5 py-4">Buruh</td>
                            <td class="px-5 py-4 font-bold">412</td>
                        </tr>
                        <tr class="border-b border-slate-200">
                            <td class="px-5 py-4">PNS</td>
                            <td class="px-5 py-4 font-bold">126</td>
                        </tr>
                        <tr class="border-b border-slate-200">
                            <td class="px-5 py-4">Swasta</td>
                            <td class="px-5 py-4 font-bold">538</td>
                        </tr>
                        <tr class="border-b border-slate-200">
                            <td class="px-5 py-4">Wiraswasta</td>
                            <td class="px-5 py-4 font-bold">296</td>
                        </tr>
                        <tr class="border-b border-slate-200">
                            <td class="px-5 py-4">Pedagang</td>
                            <td class="px-5 py-4 font-bold">184</td>
                        </tr>
                        <tr class="border-b border-slate-200">
                            <td class="px-5 py-4">Nelayan</td>
                            <td class="px-5 py-4 font-bold">34</td>
                        </tr>
                        <tr>
                            <td class="px-5 py-4">Belum/Tidak Bekerja</td>
                            <td class="px-5 py-4 font-bold">844</td>
                        </tr>
                    @elseif($submenuTitle === 'Status Perkawinan')
                        <tr class="border-b border-slate-200">
                            <td class="px-5 py-4">Belum Kawin</td>
                            <td class="px-5 py-4 font-bold">1.084</td>
                        </tr>
                        <tr class="border-b border-slate-200">
                            <td class="px-5 py-4">Kawin</td>
                            <td class="px-5 py-4 font-bold">1.642</td>
                        </tr>
                        <tr class="border-b border-slate-200">
                            <td class="px-5 py-4">Cerai Hidup</td>
                            <td class="px-5 py-4 font-bold">214</td>
                        </tr>
                        <tr>
                            <td class="px-5 py-4">Cerai Mati</td>
                            <td class="px-5 py-4 font-bold">178</td>
                        </tr>
                    @elseif($submenuTitle === 'Tingkat Pendidikan')
                        <tr class="border-b border-slate-200">
                            <td class="px-5 py-4">Belum Sekolah</td>
                            <td class="px-5 py-4 font-bold">186</td>
                        </tr>
                        <tr class="border-b border-slate-200">
                            <td class="px-5 py-4">SD</td>
                            <td class="px-5 py-4 font-bold">524</td>
                        </tr>
                        <tr class="border-b border-slate-200">
                            <td class="px-5 py-4">SMP</td>
                            <td class="px-5 py-4 font-bold">438</td>
                        </tr>
                        <tr class="border-b border-slate-200">
                            <td class="px-5 py-4">SMA/SMK</td>
                            <td class="px-5 py-4 font-bold">1.126</td>
                        </tr>
                        <tr class="border-b border-slate-200">
                            <td class="px-5 py-4">Diploma</td>
                            <td class="px-5 py-4 font-bold">214</td>
                        </tr>
                        <tr>
                            <td class="px-5 py-4">Sarjana (S1/S2/S3)</td>
                            <td class="px-5 py-4 font-bold">630</td>
                        </tr>
                    @elseif($submenuTitle === 'Kelompok Usia')
                        <tr class="border-b border-slate-200">
                            <td class="px-5 py-4">Balita</td>
                            <td class="px-5 py-4 font-bold">312</td>
                        </tr>
                        <tr class="border-b border-slate-200">
                            <td class="px-5 py-4">Anak-anak</td>
                            <td class="px-5 py-4 font-bold">486</td>
                        </tr>
                        <tr class="border-b border-slate-200">
                            <td class="px-5 py-4">Usia Produktif (15-64 tahun)</td>
                            <td class="px-5 py-4 font-bold">1.874</td>
                        </tr>
                        <tr>
                            <td class="px-5 py-4">Lansia</td>
                            <td class="px-5 py-4 font-bold">446</td>
                        </tr>
                    @else
                        <tr class="border-b border-slate-200">
                            <td class="px-5 py-4">Data contoh 1</td>
                            <td class="px-5 py-4 font-bold">1.247</td>
                        </tr>
                        <tr>
                            <td class="px-5 py-4">Data contoh 2</td>
                            <td class="px-5 py-4 font-bold">1.871</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>

        <a href="{{ in_array($kategori, ['ekonomi', 'inklusi'], true) ? route('data.statistik-penduduk') : route('data.statistik-penduduk.kategori', $kategori) }}" class="mt-6 inline-block font-bold text-[#9bdaf2] hover:text-white">
            &larr; {{ in_array($kategori, ['ekonomi', 'inklusi'], true) ? 'Kembali ke Statistik Penduduk' : 'Kembali ke pilihan statistik' }}
        </a>
    </div>
@endsection