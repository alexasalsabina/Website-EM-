@extends('layouts.app')

@section('title', 'PKK Desa Jatisari')

@push('styles')
    @vite(['resources/css/kelembagaan-details.css'])
@endpush

@section('content')
<div class="details-wrapper">
    <div class="details-container">
        <h1 class="details-title">PKK Desa Jatisari</h1>

        <div class="details-grid">
            <div class="details-photo">
                <div class="photo-placeholder">
                    <div class="camera-icon-wrapper">
                        <div class="camera-lens"></div>
                    </div>
                    <div class="photo-text">Tempat Foto PKK</div>
                </div>
            </div>

            <div class="details-copy">
                <div class="quote-mark">“</div>
                <p class="desc-text">
                    PKK Desa Jatisari memimpin inisiatif keluarga sejahtera dengan program kesehatan, pemberdayaan perempuan, dan gerakan sosial yang menjangkau seluruh lapisan warga desa.
                </p>
                <div class="sub-title-handwritten">PKK Jatisari</div>
                <div class="sub-category-label">Pemberdayaan Kesejahteraan Keluarga</div>
                <a href="#" class="details-button">Lihat Selengkapnya</a>
            </div>
        </div>
    </div>
</div>
@endsection