@extends('layouts.app')

@section('title', 'Karang Taruna Desa Jatisari')

@push('styles')
    @vite(['resources/css/kelembagaan-details.css'])
@endpush

@section('content')
<div class="details-wrapper">
    <div class="details-container">
        <h1 class="details-title">Karang Taruna Desa Jatisari</h1>

        <div class="details-grid">
            <div class="details-photo">
                <div class="photo-placeholder">
                    <div class="camera-icon-wrapper">
                        <div class="camera-lens"></div>
                    </div>
                    <div class="photo-text">Tempat Foto Karang Taruna</div>
                </div>
            </div>

            <div class="details-copy">
                <div class="quote-mark">“</div>
                <p class="desc-text">
                    Karang Taruna merupakan organisasi sosial kemasyarakatan yang menjadi wadah pengembangan generasi muda di Desa Jatisari. Organisasi ini berperan aktif dalam berbagai kegiatan sosial, kepemudaan, olahraga, seni budaya, pemberdayaan masyarakat, hingga kegiatan kemanusiaan demi mewujudkan pemuda yang kreatif, mandiri, dan berdaya saing.
                </p>
                <div class="sub-title-handwritten">Karang Taruna Jatisari</div>
                <div class="sub-category-label">LEMBAGA KEPEMUDAAN DESA</div>
                <a href="#" class="details-button">Lihat Selengkapnya</a>
            </div>
        </div>
    </div>
</div>
@endsection