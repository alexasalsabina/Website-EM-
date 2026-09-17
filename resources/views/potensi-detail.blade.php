@extends('layouts.app')

@section('content')
<div class="container pb-5">
    
    <!-- Kotak Utama ABU/BIRU -->
    <div class="card-detail p-4 p-md-5 text-white border border-secondary border-opacity-25 shadow-lg mx-auto">
        
        <!-- Baris Atas: Tombol Kembali -->
        <div class="mb-4">
            <a href="{{ url('/profil/potensi') }}" class="text-white text-decoration-none fw-semibold opacity-75 hover-opacity">
                ← Kembali ke Potensi Desa
            </a>
        </div>

        <div class="row align-items-start g-4">
            
            <!-- Kolom Kiri: Foto / Gambar Full Utuh -->
            <div class="col-md-5 col-lg-4">
                <div class="foto-box rounded-4 overflow-hidden border border-secondary border-opacity-25 shadow-sm">
                    <img src="{{ $detail->foto ? asset('storage/' . $detail->foto) : asset('images/default-card.jpg') }}" 
                         alt="{{ $detail->judul }}" 
                         class="img-fluid w-100">
                </div>
            </div>

            <!-- Kolom Kanan: Teks & Penjelasan -->
            <div class="col-md-7 col-lg-8 ps-md-4">
                <p class="text-light opacity-50 small mb-2">
                    Potensi Desa · {{ isset($detail->created_at) ? $detail->created_at->format('d F Y') : '07 September 2026' }} · Admin Desa
                </p>

                <h1 class="display-6 fw-normal text-white mb-3 text-lowercase">
                    {{ $detail->judul }}
                </h1>

                <p class="text-light opacity-75 lead mb-0" style="line-height: 1.6; word-break: break-word;">
                    {!! nl2br(e($detail->isi)) !!}
                </p>
            </div>

        </div>
    </div>

</div>

<style>
    /* STYLING KOTAK UTAMA (PRESISI TENGAH & JARAK IDEAL) */
    .card-detail {
        background-color: #1d3c5a;
        border-radius: 24px;
        width: 100%;
        max-width: 1000px; /* Lebar pas & seimbang di tengah */
        margin-top: 80px !important;     /* Jarak atas ideal (tidak terlalu bawah) */
        margin-bottom: 40px !important;
        margin-left: auto !important;    /* Kunci posisi tepat di tengah */
        margin-right: auto !important;   /* Kunci posisi tepat di tengah */
    }

    /* PENGATURAN GAMBAR UTUH (FULL / TANPA CROP) */
    .foto-box {
        width: 100%;
        height: auto;
    }

    .foto-box img {
        width: 100%;
        height: auto;
        object-fit: contain !important; /* Foto tampil utuh 100% */
        display: block;
    }

    /* HOVER EFFECT TOMBOL KEMBALI */
    .hover-opacity:hover {
        opacity: 1 !important;
        text-decoration: underline;
    }
</style>
@endsection