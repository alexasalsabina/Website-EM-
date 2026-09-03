@extends('layouts.app')

@section('title', $berita->judul)

@push('styles')
    @vite(['resources/css/berita.css'])
@endpush

@section('content')
<section class="berita">
    <div class="berita__inner berita__detail">

        <a href="{{ route('berita.berita') }}" class="berita__back">&larr; Kembali ke Berita</a>

        <div class="berita__detail-layout">
            @if($berita->thumbnail)
                <div class="berita__detail-media">
                    <img src="{{ asset('storage/'.$berita->thumbnail) }}"
                         alt="{{ $berita->judul }}"
                         class="berita__detail-image">
                </div>
            @endif

            <div class="berita__detail-copy">
                <p class="berita__detail-meta">
                    {{ $berita->kategori }} · {{ $berita->created_at->translatedFormat('d F Y') }} · {{ $berita->penulis }}
                </p>

                <h1 class="berita__detail-title">
                    {{ $berita->judul }}
                </h1>

                <div class="berita__detail-body">
                    {!! $berita->isi !!}
                </div>
            </div>
        </div>

    </div>
</section>
@endsection