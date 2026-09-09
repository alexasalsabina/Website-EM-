@extends('layouts.app')

{{-- SISTEM DETEKSI DATA & PENGELOMPOKAN --}}
@php
    $fotosDb = $kategori->fotos ?? collect();
    $isEvent = isset($kategori->judul);
    $galleryTitle = $isEvent ? $kategori->judul : ($kategori->nama ?? 'Galeri Event');

    // Mengambil tahun event/kategori secara aman dari database
    if ($isEvent && isset($kategori->tanggal)) {
        $galleryYear = \Carbon\Carbon::parse($kategori->tanggal)->format('Y');
    } else {
        $galleryYear = '2024';
    }

    // Mengelompokkan foto berdasarkan tahun dari database
    if ($fotosDb->isNotEmpty()) {
        $fotosByTahun = $fotosDb->groupBy(function($item) use ($isEvent, $kategori, $galleryYear) {
            if (!empty($item->tahun)) {
                return $item->tahun;
            }
            if (!empty($item->created_at)) {
                return \Carbon\Carbon::parse($item->created_at)->format('Y');
            }
            return $galleryYear;
        });
    } else {
        // Data cadangan jika database foto belum diisi
        $fotosByTahun = collect([
            $galleryYear => collect([
                (object)['id' => 1, 'judul' => 'Kegiatan 1', 'tahun' => $galleryYear],
                (object)['id' => 2, 'judul' => 'Kegiatan 2', 'tahun' => $galleryYear],
                (object)['id' => 3, 'judul' => 'Kegiatan 3', 'tahun' => $galleryYear],
            ])
        ]);
    }
@endphp

@section('content')
<!-- Import Bootstrap Icons -->
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
        margin-top: -110px !important;
        padding-top: 0 !important;
    }
    
    .hero-header {
        background-image: linear-gradient(rgba(7, 32, 20, 0.35), rgba(9, 26, 17, 0.7)), url("{{ asset('images/wisata2.jpeg') }}");
        background-size: cover;
        background-position: center 75%; 
        background-repeat: no-repeat;
        width: 100%;
        min-height: 320px;
        padding: 130px 0 70px 0; 
        position: relative;
        z-index: 1;
        display: flex;
        align-items: flex-end;
    }

    .hero-header .container {
        position: relative;
        z-index: 2;
        max-width: 1200px;
        width: 100%;
        padding-left: 1.5rem;
        padding-right: 1.5rem;
    }

    .hero-header .btn {
        background: rgba(255, 255, 255, 0.12);
        border: 1px solid rgba(255, 255, 255, 0.35);
        color: #fff;
        backdrop-filter: blur(4px);
        -webkit-backdrop-filter: blur(4px);
        box-shadow: 0 6px 18px rgba(0, 0, 0, 0.18);
        transition: all 0.25s ease;
    }

    .hero-header .btn:hover {
        background: rgba(255, 255, 255, 0.22);
        transform: translateY(-1px);
        color: #fff;
    }

    .hero-header h1 {
        font-size: clamp(2.2rem, 4vw, 4rem);
        line-height: 1.08;
        letter-spacing: -0.04em;
        font-weight: 800;
        margin-bottom: 0.75rem;
        color: #ffffff;
        text-shadow: 0 4px 14px rgba(0, 0, 0, 0.45);
    }

    .hero-header p {
        font-size: clamp(1rem, 1.8vw, 1.4rem);
        line-height: 1.6;
        color: rgba(255, 255, 255, 0.92);
        text-shadow: 0 3px 12px rgba(0, 0, 0, 0.4);
        max-width: 820px;
        margin-bottom: 0;
    }

    .main-content {
        background-color: #f8f9fa;
        border-radius: 28px 28px 0 0;
        margin-top: -35px;
        position: relative;
        z-index: 10;
        padding-bottom: 60px;
    }

    /* KOTAK FOTO BESAR MENYAMPING */
    .card-foto-besar {
        border-radius: 18px !important;
        overflow: hidden;
        border: 1px solid #e2e8f0 !important;
        background: #ffffff;
        transition: all 0.3s cubic-bezier(0.25, 0.8, 0.25, 1);
    }

    .card-foto-besar:hover {
        transform: translateY(-8px);
        box-shadow: 0 16px 32px rgba(0,0,0,0.12) !important;
    }

    .img-box-besar {
        position: relative;
        width: 100%;
        height: 260px;
        background-color: #e9ecef;
        overflow: hidden;
        cursor: pointer;
    }

    .img-box-besar img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.4s ease;
    }

    .card-foto-besar:hover .img-box-besar img {
        transform: scale(1.08);
    }

    .img-overlay {
        position: absolute;
        inset: 0;
        background: rgba(21, 115, 71, 0.35);
        display: flex;
        align-items: center;
        justify-content: center;
        opacity: 0;
        transition: opacity 0.3s ease;
    }

    .card-foto-besar:hover .img-overlay {
        opacity: 1;
    }

    .badge-tahun {
        background-color: #157347;
        color: #ffffff;
        font-weight: 600;
        font-size: 0.95rem;
        padding: 8px 20px;
        border-radius: 50px;
        box-shadow: 0 4px 12px rgba(21, 115, 71, 0.2);
    }

    .foto-grid {
        display: grid;
        grid-template-columns: repeat(3, minmax(0, 1fr));
        gap: 1.5rem;
        max-width: 1180px;
        margin: 0 auto;
    }

    .foto-grid__item {
        min-width: 0;
    }

    @media (max-width: 900px) {
        .foto-grid {
            grid-template-columns: repeat(2, minmax(0, 1fr));
        }
    }

    @media (max-width: 600px) {
        .foto-grid {
            grid-template-columns: 1fr;
        }
    }
</style>

<div class="galeri-wrapper">
    <!-- Header Banner -->
    <div class="hero-header text-white">
        <div class="container">
            <div class="mb-3">
                <a href="{{ route('galeri.index') }}" class="btn btn-sm rounded-pill px-3 fw-semibold shadow-sm">
                    <i class="bi bi-arrow-left me-1"></i> Kembali ke Galeri
                </a>
            </div>
            <h1 class="fw-bold display-6 mb-1">{{ $galleryTitle }}</h1>
            <p class="mb-0 text-white-50" style="font-size: 0.95rem;">
                Dokumentasi perjalanan dan momen berharga {{ $galleryTitle }}.
            </p>
        </div>
    </div>

    <!-- Main Content -->
    <div class="main-content py-4">
        <div class="container py-2">

            @foreach ($fotosByTahun as $tahun => $fotos)
                <div class="mb-5">
                    <!-- Pembatas Tahun -->
                    <div class="d-flex align-items-center mb-4">
                        <span class="badge-tahun d-inline-flex align-items-center gap-2">
                            <i class="bi bi-calendar-check"></i> {{ is_numeric($tahun) ? 'Tahun ' . $tahun : $tahun }}
                        </span>
                        <hr class="flex-grow-1 ms-3 my-0 opacity-25" style="border-top: 2px dashed #157347;">
                    </div>

                    <!-- GRID MENYAMPING 3 KOTAK -->
                    <div class="foto-grid">
                        @foreach ($fotos as $foto)
                            @php
                                $pathFoto = $foto->foto ?? $foto->gambar ?? $foto->image ?? $foto->path ?? $foto->file_path ?? null;
                                
                                if (!empty($pathFoto)) {
                                    $imgSrc = \Illuminate\Support\Str::startsWith($pathFoto, 'http') ? $pathFoto : Storage::url($pathFoto);
                                } else {
                                    $imgSrc = 'https://picsum.photos/600/450?random=' . ($foto->id ?? $loop->index + 1);
                                }
                            @endphp

                            <div class="foto-grid__item">
                                <div class="card card-foto-besar h-100 shadow-sm">
                                    <!-- Area Gambar Besar -->
                                    <a href="{{ $imgSrc }}" target="_blank" rel="noopener noreferrer" class="img-box-besar d-block">
                                        <img src="{{ $imgSrc }}" alt="{{ $foto->judul ?? $galleryTitle }}">
                                        <div class="img-overlay">
                                            <span class="btn btn-light rounded-circle p-2 shadow">
                                                <i class="bi bi-arrows-angle-expand text-success fs-5"></i>
                                            </span>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endforeach

        </div>
    </div>
</div>
@endsection