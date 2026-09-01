@extends('layouts.app')

@section('title', 'Event Desa Jatisari')

@push('styles')
    @vite(['resources/css/event.css'])
@endpush

@section('content')
<section class="event">
    {{-- Hero Banner --}}
    <div class="event__hero-banner" style="background-image: url('{{ asset('images/karnaval.png') }}');">
        <div class="event__hero-banner-content">
            <h1 class="event__hero-banner-title">Event Desa</h1>
            <p class="event__hero-banner-subtitle">Informasi lengkap mengenai kegiatan dan acara yang diselenggarakan di Desa Jatisari.</p>
            <a href="#agenda" class="btn btn--primary">Jelajahi Event</a>
        </div>
    </div>

    <div class="event__inner">
        {{-- Section 1: Agenda Kegiatan Desa --}}
        <div id="agenda" class="event__section">
            <div class="event__section-header event__section-header--center">
                <h2 class="event__section-title">Agenda Kegiatan Desa</h2>
                <span class="event__section-divider"></span>
                <p class="event__section-subtitle">Berbagai kegiatan menarik yang akan datang di Desa Jatisari</p>
            </div>

            <div class="event__cards event__cards--grid4">
                @forelse($events as $event)
                    <div class="event__item-card">
                        <div class="event__item-img-wrapper">
                            <img src="{{ $event->thumbnail ? asset('storage/' . $event->thumbnail) : asset('images/karnaval.png') }}"
                                 alt="{{ $event->judul }}">
                            <div class="event__date-badge">
                                <span class="event__date-badge-day">{{ $event->tanggal->format('d') }}</span>
                                <span class="event__date-badge-month">{{ strtoupper($event->tanggal->translatedFormat('M')) }}</span>
                            </div>
                        </div>
                        <div class="event__item-content">
                            <h3 class="event__item-title">{{ $event->judul }}</h3>
                            <ul class="event__meta-list">
                                <li>📅 {{ $event->tanggal->translatedFormat('d F Y') }}</li>
                                <li>⏰ {{ $event->waktu }}</li>
                                <li>📍 {{ $event->lokasi }}</li>
                            </ul>
                            <p class="event__item-excerpt">{{ \Illuminate\Support\Str::limit($event->deskripsi, 100) }}</p>
                            <a href="{{ route('event.show', $event->slug) }}" class="btn btn--outline">Lihat Detail</a>
                        </div>
                    </div>
                @empty
                    <p class="event__empty">Belum ada event yang tersedia saat ini.</p>
                @endforelse
            </div>
        </div>

        {{-- Section 2: Kalender & Event Terdekat --}}
        <div class="event__top">
            <aside class="event__sidebar">
                <div class="event__sidebar-card">
                    <p class="event__sidebar-title">Kalender Event</p>
                    <div class="event__calendar-widget">
                        <div class="event__calendar-header">
                            <button type="button">&lt;</button>
                            <strong>{{ now()->translatedFormat('F Y') }}</strong>
                            <button type="button">&gt;</button>
                        </div>
                        {{-- Catatan: kalender ini masih statis (belum menandai tanggal event secara dinamis). --}}
                        <div class="event__calendar-grid">
                            <span>Min</span><span>Sen</span><span>Sel</span><span>Rab</span><span>Kam</span><span>Jum</span><span>Sab</span>
                            @for($i = 1; $i <= now()->daysInMonth; $i++)
                                <span class="{{ $i == now()->day ? 'active' : '' }}">{{ $i }}</span>
                            @endfor
                        </div>
                    </div>
                </div>
            </aside>

            <div class="event__hero">
                @if($eventTerdekat)
                    <div class="event__sidebar-card event__nearest-card">
                        <p class="event__sidebar-title">Event Terdekat</p>
                        <div class="event__nearest-body">
                            <img src="{{ $eventTerdekat->thumbnail ? asset('storage/' . $eventTerdekat->thumbnail) : asset('images/karnaval.png') }}"
                                 alt="{{ $eventTerdekat->judul }}" class="event__nearest-img">
                            <div class="event__nearest-info">
                                <span class="event__tag">Event Terdekat</span>
                                <h3 class="event__nearest-title">{{ $eventTerdekat->judul }}</h3>
                                <ul class="event__meta-list">
                                    <li>📅 {{ $eventTerdekat->tanggal->translatedFormat('d F Y') }}</li>
                                    <li>⏰ {{ $eventTerdekat->waktu }}</li>
                                    <li>📍 {{ $eventTerdekat->lokasi }}</li>
                                </ul>
                                <div class="event__nearest-desc-box">
                                    <p>{{ \Illuminate\Support\Str::limit($eventTerdekat->deskripsi, 150) }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
</section>
@endsection