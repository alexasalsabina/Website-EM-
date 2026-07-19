@extends('layouts.app')

@section('title', 'Berita')

@push('styles')
    @vite(['resources/css/berita.css'])
@endpush

@section('content')
<section class="berita-list">
    <div class="berita-list__grid">

        <a href="#" class="berita-card">
            <img src="{{ asset('images/jatisari.png') }}" alt="Judul Berita" class="berita-card__img">
            <div class="berita-card__body">
                <span class="berita-card__date">01/01/2026</span>
                <h3 class="berita-card__title">Judul Berita di Sini</h3>
                <p class="berita-card__excerpt">
                    Cuplikan singkat isi berita akan tampil di sini, menjelaskan
                    ringkasan dari kegiatan atau informasi terkait.
                </p>
            </div>
        </a>

        <a href="#" class="berita-card">
            <img src="{{ asset('images/jatisari.png') }}" alt="Judul Berita" class="berita-card__img">
            <div class="berita-card__body">
                <span class="berita-card__date">01/01/2026</span>
                <h3 class="berita-card__title">Judul Berita di Sini</h3>
                <p class="berita-card__excerpt">
                    Cuplikan singkat isi berita akan tampil di sini, menjelaskan
                    ringkasan dari kegiatan atau informasi terkait.
                </p>
            </div>
        </a>

        <a href="#" class="berita-card">
            <img src="{{ asset('images/jatisari.png') }}" alt="Judul Berita" class="berita-card__img">
            <div class="berita-card__body">
                <span class="berita-card__date">01/01/2026</span>
                <h3 class="berita-card__title">Judul Berita di Sini</h3>
                <p class="berita-card__excerpt">
                    Cuplikan singkat isi berita akan tampil di sini, menjelaskan
                    ringkasan dari kegiatan atau informasi terkait.
                </p>
            </div>
        </a>

    </div>
</section>
@endsection