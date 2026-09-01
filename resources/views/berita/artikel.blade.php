@extends('layouts.app')

@section('title', 'Artikel Desa Jatisari')

@push('styles')

    @vite(['resources/css/berita.css'])
@endpush

@section('content')
<section class="berita">
    <div class="berita__inner">
        <x-section-heading
            eyebrow="Artikel"
            title="Artikel Desa Jatisari"
            subtitle="Tulisan dan artikel informatif seputar Desa Jatisari."
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
                <p class="text-gray-500">Belum ada artikel yang dipublikasikan.</p>
            </div>
        @endif

    </div>

	@vite(['resources/css/berita.css'])
@endpush

@section('content')
<section class="berita artikel-page">
	<div class="berita__inner">
		<div class="artikel-page__heading">
			<x-section-heading
				title="Artikel Desa Jatisari"
				subtitle="Cerita, gagasan, dan informasi pilihan dari Desa Jatisari."
			/>
		</div>

		<div class="berita__cards artikel-page__cards">
			<x-article-card
				href="javascript:void(0)"
				image="images/Sawah.JPG"
				date="28 Februari 2026"
				title="Festival Kebudayaan Desa Sukses Menjadi Magnet Wisata Lokal"
				excerpt="Desa Jatisari menarik pengunjung dengan pertunjukan seni, kuliner lokal, dan pameran produk UMKM yang digelar bersama warga."
				class="article-card--compact-image"
			/>
			<x-article-card
				href="javascript:void(0)"
				image="images/wisata.png"
				date="14 Februari 2026"
				title="Pemberdayaan UMKM dan Branding Produk Lokal"
				excerpt="Pelatihan pemasaran online membantu pelaku usaha desa menjangkau pasar lebih luas."
				class="article-card--compact-image"
			/>
			<x-article-card
				href="javascript:void(0)"
				image="images/posyandu-4a.JPG"
				date="03 Februari 2026"
				title="Gerakan Kebersihan Desa Menuju Lingkungan Sehat"
				excerpt="Warga desa bekerja sama menjaga lingkungan dan menghidupkan ruang publik hijau."
				class="article-card--compact-image"
			/>
		</div>
	</div>

</section>
@endsection