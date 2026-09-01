@extends('layouts.app')

@section('title', 'Opini Desa Jatisari')

@push('styles')
    @vite(['resources/css/berita.css'])
@endpush

@section('content')
<section class="berita">
    <div class="berita__inner">
        <x-section-heading
            eyebrow="Opini"
            title="Opini Warga Desa Jatisari"
            subtitle="Opini dan pandangan seputar isu-isu di Desa Jatisari."
        />

        @if($beritas->count() > 0)
            <div class="berita__cards">
                @foreach($beritas as $berita)
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
                <p class="text-gray-500">Belum ada opini yang dipublikasikan.</p>
            </div>
        @endif

    </div>
</section>
@endsection