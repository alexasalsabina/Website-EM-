@extends('layouts.app')

@section('content')
<div class="container py-5">

    <div class="mb-4">
        <a href="{{ route('galeri.index') }}" class="text-decoration-none text-muted">&larr; Kembali ke Galeri</a>
        <h2 class="fw-bold mt-2">{{ $kategori->nama }}</h2>
        <p class="text-muted">Perjalanan {{ $kategori->nama }} dari masa ke masa.</p>
    </div>

    @forelse ($fotosByTahun as $tahun => $fotos)
        <div class="mb-5">
            <div class="d-flex align-items-center mb-3">
                <span class="badge bg-primary fs-6 px-3 py-2">{{ $tahun }}</span>
                <hr class="flex-grow-1 ms-3">
            </div>

            <div class="row g-4">
                @foreach ($fotos as $foto)
                    <div class="col-md-4 col-sm-6">
                        <div class="card h-100 shadow-sm border-0">
                            <img src="{{ Storage::url($foto->foto) }}"
                                 class="card-img-top" style="height:220px;object-fit:cover;cursor:pointer;"
                                 alt="{{ $foto->judul }}"
                                 data-bs-toggle="modal" data-bs-target="#modalFoto{{ $foto->id }}">

                            <div class="card-body">
                                <h6 class="card-title mb-1">{{ $foto->judul }}</h6>
                                @if ($foto->keterangan)
                                    <p class="text-muted small mb-0">{{ Str::limit($foto->keterangan, 80) }}</p>
                                @endif
                            </div>
                        </div>
                    </div>

                    {{-- Modal untuk lihat foto full --}}
                    <div class="modal fade" id="modalFoto{{ $foto->id }}" tabindex="-1">
                        <div class="modal-dialog modal-dialog-centered modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h6 class="modal-title">{{ $foto->judul }} — {{ $foto->tahun }}</h6>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                </div>
                                <div class="modal-body text-center">
                                    <img src="{{ Storage::url($foto->foto) }}" class="img-fluid rounded">
                                    @if ($foto->keterangan)
                                        <p class="text-muted mt-3">{{ $foto->keterangan }}</p>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    @empty
        <p class="text-muted text-center">Belum ada foto untuk kategori ini.</p>
    @endforelse

</div>
@endsection