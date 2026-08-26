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

            <a href="{{ route('event.index') }}" class="btn btn--outline" style="margin-top:2rem;">← Kembali ke Semua Event</a>
        </div>
    </div>
</section>
@endsection