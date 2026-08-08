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
            $kategori = [
                ['Masjid','🕌'],
                ['Kantor Desa','🏢'],
                ['Sekolah','🏫'],
                ['Pemakaman','🪦'],
                ['Lapangan','⚽'],
                ['Posyandu','🩺'],
                ['Wisata','🌳'],
                ['Kopdes','🤝'],
            ];
        @endphp

        @foreach($kategori as $item)

        <div class="kategori-card">

            <div class="kategori-icon">
                {{ $item[1] }}
            </div>

            <h4>{{ $item[0] }}</h4>

            <p>Kelola foto {{ strtolower($item[0]) }}</p>

            <a href="#" class="btn-kelola">
                Kelola
            </a>

        </div>

        @endforeach

    </div>

</div>

@endsection

@push('scripts')
    @vite('resources/js/admin/galeri.js')
@endpush