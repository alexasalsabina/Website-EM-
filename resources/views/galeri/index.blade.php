@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="text-center mb-5">
        <h2 class="fw-bold">Galeri Desa</h2>
        <p class="text-muted">Dokumentasi perkembangan fasilitas dan tempat-tempat penting di desa dari waktu ke waktu.</p>
    </div>

    <div class="row g-4">
        @forelse ($kategoris as $kategori)
            <div class="col-md-4 col-sm-6">
                <a href="{{ route('galeri.show', $kategori->slug) }}" class="text-decoration-none">
                    <div class="card h-100 shadow-sm border-0">
                        @php
                            $fotoTerbaru = $kategori->fotos->sortByDesc('tahun')->first();
                        @endphp

                        @if ($fotoTerbaru)
                            <img src="{{ Storage::url($fotoTerbaru->foto) }}"
                                 class="card-img-top" style="height:200px;object-fit:cover;"
                                 alt="{{ $kategori->nama }}">
                        @else
                            <div class="bg-light d-flex align-items-center justify-content-center" style="height:200px;">
                                <span class="text-muted small">Belum ada foto</span>
                            </div>
                        @endif

                        <div class="card-body">
                            <h5 class="card-title text-dark mb-1">{{ $kategori->nama }}</h5>
                            <p class="text-muted small mb-0">{{ $kategori->fotos_count }} foto</p>
                        </div>
                    </div>
                </a>
            </div>
        @empty
            <div class="col-12 text-center text-muted">
                Belum ada galeri yang tersedia.
            </div>
        @endforelse
    </div>
</div>
@endsection