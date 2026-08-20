@extends('layouts.app')

@section('title', 'Artikel Desa Jatisari')

@push('styles')
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