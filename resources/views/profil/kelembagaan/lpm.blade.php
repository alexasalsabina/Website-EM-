@extends('layouts.app')

@section('title', 'LPM Desa Jatisari')

@push('styles')
    @vite(['resources/css/kelembagaan-details.css'])
@endpush

@section('content')
<div class="details-wrapper">
    <div class="details-container">
        <h1 class="details-title">LPM Desa Jatisari</h1>

        <div class="details-grid">
            <div class="details-photo">
                <div class="photo-placeholder">
                    <div class="camera-icon-wrapper">
                        <div class="camera-lens"></div>
                    </div>
                    <div class="photo-text">Tempat Foto LPM</div>
                </div>
            </div>

            <div class="details-copy">
                <div class="quote-mark">“</div>
                <p class="desc-text">
                    Lembaga Pemberdayaan Masyarakat (LPM) merupakan mitra strategis Pemerintah Desa Jatisari dalam menampung dan menyalurkan aspirasi serta kebutuhan masyarakat. LPM berperan aktif dalam merencanakan, melaksanakan, dan mengendalikan pembangunan desa secara partisipatif guna meningkatkan keswadayaan dan gotong royong warga.
                </p>
                <div class="sub-title-handwritten">LPM Jatisari</div>
                <div class="sub-category-label">LEMBAGA PEMBERDAYAAN MASYARAKAT DESA</div>
                <a href="#" class="details-button">Lihat Selengkapnya</a>
            </div>
        </div>
    </div>
</div>
@endsection