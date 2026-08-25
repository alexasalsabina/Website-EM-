@extends('admin.layouts.app')

@section('title', 'Galeri')

@push('styles')
    @vite('resources/css/admin/galeri.css')
@endpush

@section('content')

<div class="galeri-page">

    <div class="page-header">
        <h2>Galeri Desa</h2>
        <p>Pilih kategori galeri yang ingin dikelola.</p>
    </div>

    <div class="kategori-grid">

        @php
            $ikonKategori = [
                'Masjid' => '🕌',
                'Kantor Desa' => '🏢',
                'Sekolah' => '🏫',
                'Pemakaman' => '🪦',
                'Lapangan' => '⚽',
                'Posyandu' => '🩺',
                'Wisata' => '🌳',
                'Kopdes' => '🤝',
            ];
        @endphp

        @forelse($kategoris as $kategori)

        <div class="kategori-card">

            <div class="kategori-icon">
                {{ $ikonKategori[$kategori->nama] ?? '🖼️' }}
            </div>

            <h4>{{ $kategori->nama }}</h4>

            <p>{{ $kategori->fotos_count }} foto tersimpan</p>

            <a href="{{ route('admin.galeri-foto.index', ['kategori' => $kategori->id]) }}" class="btn-kelola" aria-label="Kelola foto {{ $kategori->nama }}">
                Kelola
            </a>

        </div>

        @empty
            <p class="galeri-empty">Belum ada kategori galeri.</p>
        @endforelse

    </div>

</div>

@endsection

@push('scripts')
    @vite('resources/js/admin/galeri.js')
@endpush