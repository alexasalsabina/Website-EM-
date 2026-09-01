@extends('layouts.app')

{{-- SISTEM DETEKSI DATA & PENGELOMPOKAN --}}
@php
    $fotosDb = $kategori->fotos ?? collect();

    // Mengelompokkan foto berdasarkan tahun
    if ($fotosDb->isNotEmpty()) {
        $fotosByTahun = $fotosDb->groupBy(function($item) {
            return $item->tahun ?? '2024';
        });
    } else {
        // Data cadangan jika database benar-benar kosong
        $fotosByTahun = collect([
            '2024' => collect([
                (object)['id' => 1, 'judul' => 'Kegiatan 1', 'tahun' => '2024'],
                (object)['id' => 2, 'judul' => 'Kegiatan 2', 'tahun' => '2024'],
                (object)['id' => 3, 'judul' => 'Kegiatan 3', 'tahun' => '2024'],
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
        background-image: linear-gradient(rgba(0, 0, 0, 0.4), rgba(0, 0, 0, 0.6)), url("{{ asset('images/wisata2.jpeg') }}");
        background-size: cover;
        background-position: center 75%; 
        background-repeat: no-repeat;
        width: 100%;
        min-height: 320px;
        padding: 130px 0 70px 0; 
        position: relative;
        z-index: 1;
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
</style>

<div class="galeri-wrapper">
    <!-- Header Banner -->
    <div class="hero-header text-white">
        <div class="container">
            <div class="mb-3">
                <a href="{{ route('galeri.index') }}" class="btn btn-sm btn-light rounded-pill px-3 fw-semibold shadow-sm text-success">
                    <i class="bi bi-arrow-left me-1"></i> Kembali ke Galeri
                </a>
            </div>
            <h1 class="fw-bold display-6 mb-1">{{ $kategori->nama ?? 'Galeri Event' }}</h1>
            <p class="mb-0 text-white-50" style="font-size: 0.95rem;">
                Dokumentasi perjalanan dan momen berharga {{ $kategori->nama ?? '' }} dari masa ke masa.
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

                    <!-- GRID MENYAMPING 3 KOTAK (row-cols-md-3 PASTI 3 KOLOM) -->
                    <div class="row row-cols-1 row-cols-md-3 g-4">
                        @foreach ($fotos as $foto)
                            @php
                                // Otomatis cek nama kolom gambar di DB (foto, gambar, image, path, dll)
                                $pathFoto = $foto->foto ?? $foto->gambar ?? $foto->image ?? $foto->path ?? $foto->file_path ?? null;
                                
                                if (!empty($pathFoto)) {
                                    $imgSrc = \Illuminate\Support\Str::startsWith($pathFoto, 'http') ? $pathFoto : Storage::url($pathFoto);
                                } else {
                                    // Gambar sampel otomatis jika file di database kosong
                                    $imgSrc = 'https://picsum.photos/600/450?random=' . ($foto->id ?? $loop->index + 1);
                                }
                            @endphp

                            <div class="col">
                                <div class="card card-foto-besar h-100 shadow-sm">
                                    <!-- Area Gambar Besar -->
                                    <div class="img-box-besar" data-bs-toggle="modal" data-bs-target="#modalFoto{{ $foto->id ?? $loop->index }}">
                                        <img src="{{ $imgSrc }}" alt="{{ $foto->judul ?? 'Foto Event' }}">
                                        <div class="img-overlay">
                                            <span class="btn btn-light rounded-circle p-2 shadow">
                                                <i class="bi bi-arrows-angle-expand text-success fs-5"></i>
                                            </span>
                                        </div>
                                    </div>

                                    <!-- Deskripsi Foto -->
                                    <div class="card-body p-3 d-flex flex-column justify-content-between">
                                        <div>
                                            <h6 class="fw-bold text-dark mb-1" style="font-size: 1.05rem;">
                                                {{ $foto->judul ?? $foto->nama ?? $kategori->nama ?? 'Dokumentasi Foto' }}
                                            </h6>
                                            @if (!empty($foto->keterangan ?? $foto->deskripsi))
                                                <p class="text-muted small mb-0">{{ \Illuminate\Support\Str::limit($foto->keterangan ?? $foto->deskripsi, 90) }}</p>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endforeach

        </div>
    </div>
</div>

<!-- MODAL POPUP FULLSCREEN -->
@foreach ($fotosByTahun as $tahun => $fotos)
    @foreach ($fotos as $foto)
        @php
            $pathFotoModal = $foto->foto ?? $foto->gambar ?? $foto->image ?? $foto->path ?? null;
            $imgModalSrc = !empty($pathFotoModal) ? (\Illuminate\Support\Str::startsWith($pathFotoModal, 'http') ? $pathFotoModal : Storage::url($pathFotoModal)) : 'https://picsum.photos/900/600?random=' . ($foto->id ?? $loop->index + 1);
        @endphp
        <div class="modal fade" id="modalFoto{{ $foto->id ?? $loop->index }}" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content border-0 shadow-lg" style="border-radius: 20px; overflow: hidden; background: #1a1a1a;">
                    <div class="modal-header border-0 text-white p-3 px-4">
                        <div>
                            <h6 class="modal-title fw-bold text-white mb-0">{{ $foto->judul ?? $kategori->nama ?? 'Detail Foto' }}</h6>
                            <small class="text-white-50"><i class="bi bi-calendar-event me-1"></i> Tahun {{ $foto->tahun ?? '2024' }}</small>
                        </div>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body text-center p-0 bg-black d-flex justify-content-center align-items-center" style="min-height: 350px;">
                        <img src="{{ $imgModalSrc }}" class="img-fluid" style="max-height: 78vh; width: auto; object-fit: contain;" alt="Foto">
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endforeach

<!-- Script Bootstrap -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
@endsection