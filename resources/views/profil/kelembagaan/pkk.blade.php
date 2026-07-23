@extends('layouts.app')

@section('title', 'LPM Desa Jatisari')

@section('content')
<!-- Import Bootstrap & Font Langsung agar CSS-nya PASTI ter-load -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Caveat:wght@700&family=Plus+Jakarta+Sans:wght@400;500;700;800&display=swap" rel="stylesheet">

<style>
    .lpm-wrapper {
        font-family: 'Plus Jakarta Sans', sans-serif;
        padding-top: 40px;
        padding-bottom: 60px;
        background-color: #ffffff;
    }

    /* Judul Utama Atas */
    .title-lpm {
        color: #198754 !important; /* Warna hijau khas */
        font-weight: 800;
        font-size: 2.3rem;
        margin-bottom: 2rem;
    }

    /* Box Tempat Foto (Placeholder Garis Putus-putus) */
    .photo-placeholder {
        background-color: #ededed;
        border: 2px dashed #b5b5b5;
        border-radius: 12px;
        width: 100%;
        min-height: 380px;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        color: #666666;
        padding: 20px;
    }

    /* Ikon Kamera Bulat */
    .camera-icon-wrapper {
        background-color: #7a6e85;
        width: 65px;
        height: 50px;
        border-radius: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
        position: relative;
        margin-bottom: 15px;
    }

    .camera-icon-wrapper::before {
        content: '';
        position: absolute;
        top: -6px;
        width: 20px;
        height: 6px;
        background-color: #7a6e85;
        border-top-left-radius: 3px;
        border-top-right-radius: 3px;
    }

    .camera-lens {
        width: 24px;
        height: 24px;
        background-color: #dedede;
        border: 4px solid #4a3f55;
        border-radius: 50%;
    }

    .photo-text {
        font-size: 1.05rem;
        color: #666666;
        font-weight: 500;
    }

    /* Simbol Kutipan / Quote */
    .quote-mark {
        font-size: 4rem;
        font-weight: 900;
        line-height: 0.8;
        color: #000000;
        margin-bottom: 1.2rem;
        font-family: sans-serif;
    }

    /* Paragraf Penjelasan */
    .desc-text {
        color: #4a4a4a;
        font-size: 1.05rem;
        line-height: 1.8;
        text-align: justify;
        margin-bottom: 2rem;
    }

    /* Teks Judul Bergaya Tulisan Tangan */
    .sub-title-handwritten {
        font-family: 'Caveat', cursive, sans-serif;
        font-size: 3rem;
        font-weight: 700;
        color: #000000;
        line-height: 1;
        margin-bottom: 0.3rem;
    }

    /* Label Sub Kategori */
    .sub-category-label {
        font-weight: 800;
        letter-spacing: 1.5px;
        font-size: 0.85rem;
        color: #000000;
        text-transform: uppercase;
        margin-bottom: 2rem;
    }

    /* Tombol Merah/Oranye */
    .btn-lihat-selengkapnya {
        background-color: #f05235;
        color: #ffffff !important;
        font-weight: 600;
        font-size: 0.95rem;
        padding: 12px 28px;
        border-radius: 6px;
        border: none;
        text-decoration: none;
        display: inline-block;
        box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        transition: all 0.2s ease;
    }

    .btn-lihat-selengkapnya:hover {
        background-color: #d93e22;
    }
</style>

<div class="lpm-wrapper">
    <div class="container">
        <!-- Judul Atas -->
        <h1 class="title-lpm">LPM Desa Jatisari</h1>

        <div class="row g-5 align-items-center">
            <!-- Kolom Kiri: Tempat Foto Garis Putus-putus -->
            <div class="col-lg-6">
                <div class="photo-placeholder">
                    <div class="camera-icon-wrapper">
                        <div class="camera-lens"></div>
                    </div>
                    <div class="photo-text">Tempat Foto LPM</div>
                </div>
            </div>

            <!-- Kolom Kanan: Teks & Keterangan -->
            <div class="col-lg-6">
                <!-- Ikon Kutipan -->
                <div class="quote-mark">“</div>

                <!-- Isi Deskripsi -->
                <p class="desc-text">
                    Lembaga Pemberdayaan Masyarakat (LPM) merupakan mitra strategis Pemerintah Desa Jatisari dalam menampung dan menyalurkan aspirasi serta kebutuhan masyarakat. LPM berperan aktif dalam merencanakan, melaksanakan, dan mengendalikan pembangunan desa secara partisipatif guna meningkatkan keswadayaan dan gotong royong warga.
                </p>

                <!-- Teks Hand-written & Label Sub -->
                <div class="sub-title-handwritten">LPM Jatisari</div>
                <div class="sub-category-label">LEMBAGA PEMBERDAYAAN MASYARAKAT DESA</div>

                <!-- Tombol -->
                <div>
                    <a href="#" class="btn-lihat-selengkapnya">Lihat Selengkapnya</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection