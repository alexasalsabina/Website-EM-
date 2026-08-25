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
                $lainnya = $beritas->skip(1);
            @endphp

            <div class="berita__top">
                <div class="berita__hero is-active">
                    <x-article-card
                        href="{{ route('berita.detail', $hero->slug) }}"
                        image="{{ $hero->thumbnail ? asset('storage/'.$hero->thumbnail) : 'images/jatisari.png' }}"
                        date="{{ $hero->created_at->translatedFormat('d F Y') }}"
                        title="{{ $hero->judul }}"
                        excerpt="{{ Str::limit(strip_tags($hero->isi), 160) }}"
                        class="article-card--hero"
                    />
                </div>

                <aside class="berita__sidebar" aria-label="Headline terbaru">
                    <div class="berita__sidebar-card">
                        <p class="berita__sidebar-title">Headline Terbaru</p>
                        <ul class="berita__headline-list">
                            @foreach($beritas->skip(1)->take(4) as $item)
                                <li>
                                    <a href="{{ route('berita.detail', $item->slug) }}" class="berita__headline-item">
                                        <span class="berita__headline-date">{{ $item->created_at->translatedFormat('d M Y') }}</span>
                                        <strong>{{ $item->judul }}</strong>
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </aside>
            </div>

            <div class="berita__cards">
                @foreach($beritas->skip(1) as $berita)
                    <x-article-card
                        href="{{ route('berita.detail', $berita->slug) }}"
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