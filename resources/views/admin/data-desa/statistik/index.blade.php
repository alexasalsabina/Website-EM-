@extends('admin.layouts.app')

@section('title', 'Statistik Data Desa')
@section('page-title', 'Statistik Data Desa')

@section('content')
<div class="p-8">

    <div class="mb-8 flex flex-wrap items-center justify-between gap-4">
        <div>
            <h1 class="text-3xl font-bold text-blue-800">Statistik Data Desa</h1>
            <p class="mt-1 text-gray-500">Ringkasan data kependudukan Desa Jatisari.</p>
        </div>

        <a href="{{ route('admin.data-desa.index') }}"
           class="inline-flex items-center gap-2 rounded-xl bg-gray-500 px-5 py-3 font-semibold text-white shadow-md transition hover:bg-gray-600">
            &larr; Kembali
        </a>
    </div>

    @if(session('success'))
        <div class="mb-6 rounded-lg border border-green-200 bg-green-50 p-4 text-green-700">
            {{ session('success') }}
        </div>
    @endif

    <div class="mb-8 grid grid-cols-1 gap-6 sm:grid-cols-2 xl:grid-cols-4">

        <div class="rounded-2xl bg-white p-6 shadow-md">
            <p class="text-sm font-medium text-gray-500">Total Penduduk</p>
            <p class="mt-2 text-3xl font-bold text-blue-800">{{ number_format($totalPenduduk) }}</p>
        </div>

        <div class="rounded-2xl bg-white p-6 shadow-md">
            <p class="text-sm font-medium text-gray-500">Laki-laki</p>
            <p class="mt-2 text-3xl font-bold text-sky-600">{{ number_format($totalLakiLaki) }}</p>
        </div>

        <div class="rounded-2xl bg-white p-6 shadow-md">
            <p class="text-sm font-medium text-gray-500">Perempuan</p>
            <p class="mt-2 text-3xl font-bold text-pink-500">{{ number_format($totalPerempuan) }}</p>
        </div>

        <div class="rounded-2xl bg-white p-6 shadow-md">
            <p class="text-sm font-medium text-gray-500">Penyandang Disabilitas</p>
            <p class="mt-2 text-3xl font-bold text-amber-600">{{ number_format($totalDisabilitas) }}</p>
        </div>

    </div>

    <div class="mb-4 flex justify-end">
        <a href="{{ route('admin.data-desa.statistik.edit', 'gender') }}"
           class="inline-flex items-center gap-2 rounded-lg bg-blue-700 px-4 py-2 text-sm font-semibold text-white transition hover:bg-blue-800">
            ✏️ Edit Jenis Total Penduduk
        </a>
    </div>

    <div class="grid grid-cols-1 gap-6 xl:grid-cols-2">

        <div class="rounded-2xl bg-white p-6 shadow-md">
            <div class="mb-4 flex items-center justify-between">
                <h2 class="text-lg font-bold text-gray-800">Demografi &mdash; Kelompok Usia</h2>
                <a href="{{ route('admin.data-desa.statistik.edit', 'usia') }}"
                   class="inline-flex items-center gap-1.5 rounded-lg bg-blue-700 px-3 py-1.5 text-sm font-semibold text-white transition hover:bg-blue-800">✏️ Edit</a>
            </div>

            @if($kelompokUsia->isEmpty())
                <p class="text-sm text-gray-400">Belum ada data.</p>
            @else
                <div class="space-y-3">
                    @foreach($kelompokUsia as $label => $jumlah)
                        @php $persen = $totalPenduduk ? round($jumlah / $totalPenduduk * 100) : 0; @endphp
                        <div>
                            <div class="mb-1 flex justify-between text-sm">
                                <span class="font-medium text-gray-600">{{ $label }}</span>
                                <span class="text-gray-500">{{ $jumlah }} orang</span>
                            </div>
                            <div class="h-2 w-full rounded-full bg-gray-100">
                                <div class="h-2 rounded-full bg-blue-600" style="width: {{ $persen }}%"></div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>

        <div class="rounded-2xl bg-white p-6 shadow-md">
            <div class="mb-4 flex items-center justify-between">
                <h2 class="text-lg font-bold text-gray-800">Demografi &mdash; Per Dusun</h2>
                <a href="{{ route('admin.data-desa.statistik.edit', 'dusun') }}"
                   class="inline-flex items-center gap-1.5 rounded-lg bg-blue-700 px-3 py-1.5 text-sm font-semibold text-white transition hover:bg-blue-800">✏️ Edit</a>
            </div>

            @if($perDusun->isEmpty())
                <p class="text-sm text-gray-400">Belum ada data.</p>
            @else
                <div class="space-y-3">
                    @foreach($perDusun as $item)
                        @php $persen = $totalPenduduk ? round($item->jumlah / $totalPenduduk * 100) : 0; @endphp
                        <div>
                            <div class="mb-1 flex justify-between text-sm">
                                <span class="font-medium text-gray-600">{{ $item->dusun }}</span>
                                <span class="text-gray-500">{{ $item->jumlah }} orang</span>
                            </div>
                            <div class="h-2 w-full rounded-full bg-gray-100">
                                <div class="h-2 rounded-full bg-emerald-600" style="width: {{ $persen }}%"></div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>

        <div class="rounded-2xl bg-white p-6 shadow-md">
            <div class="mb-4 flex items-center justify-between">
                <h2 class="text-lg font-bold text-gray-800">Status Perkawinan</h2>
                <a href="{{ route('admin.data-desa.statistik.edit', 'status_perkawinan') }}"
                   class="inline-flex items-center gap-1.5 rounded-lg bg-blue-700 px-3 py-1.5 text-sm font-semibold text-white transition hover:bg-blue-800">✏️ Edit</a>
            </div>

            @if($statusPerkawinan->isEmpty())
                <p class="text-sm text-gray-400">Belum ada data.</p>
            @else
                <div class="space-y-3">
                    @foreach($statusPerkawinan as $item)
                        @php $persen = $totalPenduduk ? round($item->jumlah / $totalPenduduk * 100) : 0; @endphp
                        <div>
                            <div class="mb-1 flex justify-between text-sm">
                                <span class="font-medium text-gray-600">{{ $item->status_perkawinan }}</span>
                                <span class="text-gray-500">{{ $item->jumlah }} orang</span>
                            </div>
                            <div class="h-2 w-full rounded-full bg-gray-100">
                                <div class="h-2 rounded-full bg-purple-600" style="width: {{ $persen }}%"></div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>

        <div class="rounded-2xl bg-white p-6 shadow-md">
            <div class="mb-4 flex items-center justify-between">
                <h2 class="text-lg font-bold text-gray-800">Pendidikan Terakhir</h2>
                <a href="{{ route('admin.data-desa.statistik.edit', 'pendidikan') }}"
                   class="inline-flex items-center gap-1.5 rounded-lg bg-blue-700 px-3 py-1.5 text-sm font-semibold text-white transition hover:bg-blue-800">✏️ Edit</a>
            </div>

            @if($pendidikan->isEmpty())
                <p class="text-sm text-gray-400">Belum ada data.</p>
            @else
                <div class="space-y-3">
                    @foreach($pendidikan as $item)
                        @php $persen = $totalPenduduk ? round($item->jumlah / $totalPenduduk * 100) : 0; @endphp
                        <div>
                            <div class="mb-1 flex justify-between text-sm">
                                <span class="font-medium text-gray-600">{{ $item->pendidikan_terakhir }}</span>
                                <span class="text-gray-500">{{ $item->jumlah }} orang</span>
                            </div>
                            <div class="h-2 w-full rounded-full bg-gray-100">
                                <div class="h-2 rounded-full bg-orange-500" style="width: {{ $persen }}%"></div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>

        <div class="rounded-2xl bg-white p-6 shadow-md">
            <div class="mb-4 flex items-center justify-between">
                <h2 class="text-lg font-bold text-gray-800">Pekerjaan</h2>
                <a href="{{ route('admin.data-desa.statistik.edit', 'pekerjaan') }}"
                   class="inline-flex items-center gap-1.5 rounded-lg bg-blue-700 px-3 py-1.5 text-sm font-semibold text-white transition hover:bg-blue-800">✏️ Edit</a>
            </div>

            @if($pekerjaan->isEmpty())
                <p class="text-sm text-gray-400">Belum ada data.</p>
            @else
                <div class="space-y-3">
                    @foreach($pekerjaan as $item)
                        @php $persen = $totalPenduduk ? round($item->jumlah / $totalPenduduk * 100) : 0; @endphp
                        <div>
                            <div class="mb-1 flex justify-between text-sm">
                                <span class="font-medium text-gray-600">{{ $item->pekerjaan }}</span>
                                <span class="text-gray-500">{{ $item->jumlah }} orang</span>
                            </div>
                            <div class="h-2 w-full rounded-full bg-gray-100">
                                <div class="h-2 rounded-full bg-cyan-600" style="width: {{ $persen }}%"></div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>

        <div class="rounded-2xl bg-white p-6 shadow-md">
            <div class="mb-4 flex items-center justify-between">
                <h2 class="text-lg font-bold text-gray-800">Jenis Disabilitas</h2>
                <a href="{{ route('admin.data-desa.statistik.edit', 'disabilitas') }}"
                   class="inline-flex items-center gap-1.5 rounded-lg bg-blue-700 px-3 py-1.5 text-sm font-semibold text-white transition hover:bg-blue-800">✏️ Edit</a>
            </div>

            @if($jenisDisabilitas->isEmpty())
                <p class="text-sm text-gray-400">Belum ada data.</p>
            @else
                <div class="space-y-3">
                    @foreach($jenisDisabilitas as $item)
                        @php $persen = $totalDisabilitas ? round($item->jumlah / $totalDisabilitas * 100) : 0; @endphp
                        <div>
                            <div class="mb-1 flex justify-between text-sm">
                                <span class="font-medium text-gray-600">{{ $item->jenis_disabilitas }}</span>
                                <span class="text-gray-500">{{ $item->jumlah }} orang</span>
                            </div>
                            <div class="h-2 w-full rounded-full bg-gray-100">
                                <div class="h-2 rounded-full bg-amber-600" style="width: {{ $persen }}%"></div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>

    </div>

</div>
@endsection
