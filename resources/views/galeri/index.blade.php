@extends('layouts.app')

@section('content')
<!-- Import Bootstrap 5 & Icons -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

<style>
    body, html {
        margin: 0 !important;
        padding: 0 !important;
    }
    
    .galeri-wrapper {
        font-family: 'Segoe UI', Roboto, Helvetica, Arial, sans-serif;
        background-color: #f8f9fa;
        min-height: 100vh;
        margin-top: 0 !important;
        padding-top: 0 !important;
    }
    
    .hero-header {
        background-image: linear-gradient(rgba(0, 0, 0, 0.2), rgba(0, 0, 0, 0.35)), url("{{ asset('images/wisata2.jpeg') }}");
        background-size: cover;
        /* Diubah ke center 75% agar foto naik & langit tidak kelihatan banyak */
        background-position: center 75%; 
        background-repeat: no-repeat;
        width: 100%;
        min-height: 420px;
        padding: 140px 0 90px 0; 
        position: relative;
        z-index: 1;
    }

    .main-content {
        background-color: #f8f9fa;
        border-radius: 24px 24px 0 0;
        margin-top: -30px;
        position: relative;
        z-index: 10;
        padding-bottom: 60px;
    }

    /* KARTU GALERI */
    .card-galeri {
        border-radius: 12px !important;
        overflow: hidden;
        border: 1px solid #e2e8f0 !important;
        background: #ffffff;
        box-shadow: 0 2px 4px rgba(0,0,0,0.04);
        transition: transform 0.2s ease, box-shadow 0.2s ease;
        cursor: pointer;
    }
    .card-galeri:hover {
        transform: translateY(-4px);
        box-shadow: 0 10px 20px rgba(0,0,0,0.08) !important;
    }
    .img-wrapper {
        position: relative;
        width: 100%;
        height: 175px; 
        background-color: #e9ecef;
        overflow: hidden;
    }
    .img-wrapper img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        display: block;
    }
    .badge-category {
        position: absolute;
        bottom: 10px;
        left: 10px;
        background-color: #157347;
        color: #ffffff;
        font-size: 0.72rem;
        padding: 4px 10px;
        border-radius: 6px;
        font-weight: 600;
    }

    .grid-galeri-container {
        margin-bottom: 40px;
    }
</style>

<div class="galeri-wrapper">
    <!-- Hero Header -->
    <div class="hero-header text-white">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-8 mb-3 mb-lg-0">
                    <h1 class="fw-bold display-5 mb-2">Galeri Desa</h1>
                    <p class="mb-0 text-white-50" style="max-width: 550px; font-size: 0.95rem;">
                        Kumpulan dokumentasi kegiatan, potret keindahan, dan momen berharga dari Desa.
                    </p>
                </div>
                
                <!-- Floating Counter Card -->
                <div class="col-lg-4 d-flex justify-content-lg-end">
                    <div class="card border-0 shadow-lg p-3 text-dark bg-white" style="border-radius: 16px; width: 250px; transform: translateY(25px);">
                        <div class="d-flex align-items-center gap-3">
                            <div class="p-3 bg-success bg-opacity-10 text-success rounded-3 fs-3">
                                <i class="bi bi-images"></i>
                            </div>
                            <div>
                                <span class="fw-bold text-dark d-block" style="font-size: 0.85rem;">Dokumentasi Desa</span>
                                <h2 class="fw-bold text-success mb-0" style="font-size: 1.6rem;">
                                    {{ $kategoris->sum('fotos_count') ?? 0 }}
                                </h2>
                                <small class="text-muted" style="font-size: 0.75rem;">Foto & Video</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Section -->
    <div class="main-content py-4">
        <div class="container">
            <!-- Search Bar -->
            <div class="d-flex justify-content-end mb-4">
                <div style="width: 280px;">
                    <div class="input-group">
                        <input type="text" class="form-control bg-white border-end-0 ps-3" placeholder="Cari galeri..." style="border-radius: 8px 0 0 8px; font-size: 0.9rem;">
                        <span class="input-group-text bg-white border-start-0 text-muted" style="border-radius: 0 8px 8px 0;">
                            <i class="bi bi-search"></i>
                        </span>
                    </div>
                </div>
            </div>

            <!-- Grid Galeri -->
            <div class="row g-4 grid-galeri-container">
                @forelse ($kategoris as $kategori)
                    @php
                        $fotoTerbaru = optional($kategori->fotos)->sortByDesc('tahun')->first();
                    @endphp
                    <div class="col-lg-4 col-md-6 col-sm-12">
                        <a href="{{ route('galeri.show', $kategori->slug ?? $kategori->id) }}" class="text-decoration-none">
                            <div class="card card-galeri h-100">
                                <div class="img-wrapper">
                                    @if ($fotoTerbaru && $fotoTerbaru->foto)
                                        <img src="{{ Storage::url($fotoTerbaru->foto) }}" alt="{{ $kategori->nama }}">
                                    @else
                                        <img src="{{ asset('images/default-card.jpg') }}" alt="{{ $kategori->nama }}">
                                    @endif
                                    <span class="badge-category">{{ $kategori->nama }}</span>
                                </div>
                                <div class="card-body p-3">
                                    <h6 class="fw-bold text-dark mb-1 text-truncate" style="font-size: 0.95rem;">{{ $kategori->nama }}</h6>
                                    <div class="d-flex justify-content-between align-items-center text-muted" style="font-size: 0.8rem;">
                                        <span><i class="bi bi-calendar-event me-1"></i> {{ $fotoTerbaru->tahun ?? date('Y') }}</span>
                                        <span><i class="bi bi-image me-1"></i> {{ $kategori->fotos_count ?? 0 }} Foto</span>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                @empty
                    <div class="col-12 text-center text-muted py-5">
                        <i class="bi bi-inbox fs-1 d-block mb-2"></i>
                        Belum ada galeri yang tersedia.
                    </div>
                @endforelse
            </div>

            <!-- Tombol Muat Lebih Banyak -->
            <div class="text-center mt-4">
                <button class="btn btn-outline-success px-4 py-2 rounded-3 fw-semibold" style="font-size: 0.9rem;">
                    Muat Lebih Banyak <i class="bi bi-arrow-repeat ms-1"></i>
                </button>
            </div>
        </div>
    </div>
</div>
@endsection