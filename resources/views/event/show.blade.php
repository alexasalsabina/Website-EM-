@extends('layouts.app')

@section('title', $event->judul . ' - Event Desa Jatisari')

@push('styles')
    @vite(['resources/css/event.css'])
@endpush

@section('content')
<section class="event">
    <div class="event__hero-banner" style="background-image: url('{{ $event->thumbnail ? asset('storage/' . $event->thumbnail) : asset('images/karnaval.png') }}');">
        <div class="event__hero-banner-content">
            <h1 class="event__hero-banner-title">{{ $event->judul }}</h1>
        </div>
    </div>

    <div class="event__inner">
        <div class="event__section">
            <ul class="event__meta-list">
                <li>📅 {{ $event->tanggal->translatedFormat('d F Y') }}</li>
                <li>⏰ {{ $event->waktu }}</li>
                <li>📍 {{ $event->lokasi }}</li>
            </ul>

            <p style="margin-top:1.5rem; line-height:1.7;">{{ $event->deskripsi }}</p>

            @if($event->fotos->isNotEmpty())
                <div class="event__gallery">
                    <div class="event__gallery-heading">
                        <span class="event__gallery-eyebrow">Dokumentasi</span>
                        <h2>Potret Kegiatan</h2>
                    </div>
                    <div class="event__gallery-grid">
                        @foreach($event->fotos as $foto)
                            <img src="{{ asset('storage/' . $foto->foto) }}"
                                 alt="Dokumentasi {{ $event->judul }}"
                                 class="event__gallery-image">
                        @endforeach
                    </div>
                </div>
            @endif

            <div style="display:flex; flex-wrap:wrap; gap:0.75rem; margin-top:2rem;">
                <a href="{{ route('event.index') }}" class="btn btn--outline">← Kembali ke Semua Event</a>
                <a href="{{ route('galeri.event.show', $event->slug) }}" class="btn btn--outline">Lihat Galeri Event →</a>
            </div>
        </div>
    </div>
</section>
@endsection