@extends('layouts.app')

@section('title', 'Berita Desa Jatisari')

@push('styles')
    @vite(['resources/css/berita.css'])
@endpush

@section('content')
<section class="berita">
    <div class="berita__inner">
        <x-section-heading
            eyebrow="Berita"
            title="Kabar Terbaru Desa Jatisari"
            subtitle="Berita dan pengumuman penting yang dirancang agar mudah dibaca dan cepat diakses oleh warga desa."
        />

        @if($beritas->count() > 0)

            @php
                $hero = $beritas->first();
            @endphp

            <div class="berita__top">
                <div class="berita__hero is-active">
                    <x-article-card
                        image="{{ $hero->thumbnail ? asset('storage/'.$hero->thumbnail) : 'images/jatisari.png' }}"
                        date="{{ $hero->created_at->translatedFormat('d F Y') }}"
                        title="{{ $hero->judul }}"
                        excerpt="{{ Str::limit(strip_tags($hero->isi), 160) }}"
                        class="article-card--hero"
                    />
                </div>
            </div>

            <div class="berita__cards">
                @foreach($beritas->skip(1) as $berita)
                    <x-article-card
                        image="{{ $berita->thumbnail ? asset('storage/'.$berita->thumbnail) : 'images/jatisari.png' }}"
                        date="{{ $berita->created_at->translatedFormat('d F Y') }}"
                        title="{{ $berita->judul }}"
                        excerpt="{{ Str::limit(strip_tags($berita->isi), 140) }}"
                    />
                @endforeach
            </div>

            <div class="mt-6">
                {{ $beritas->links() }}
            </div>

        @else
            <div class="berita__empty text-center py-10">
                <p class="text-gray-500">Belum ada berita yang dipublikasikan.</p>
            </div>
        @endif
    </div>
</section>
@endsection