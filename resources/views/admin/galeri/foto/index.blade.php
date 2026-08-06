@extends('admin.layouts.app')

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h4 class="mb-0">Foto - {{ $kategori->nama }}</h4>
            <a href="{{ route('admin.galeri-kategori.index') }}" class="text-muted small">&larr; Kembali ke daftar kategori</a>
        </div>
        <a href="{{ route('admin.galeri-foto.create', $kategori) }}" class="btn btn-primary">
            + Tambah Foto
        </a>
    </div>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @php
        $fotosByTahun = $fotos->groupBy('tahun')->sortKeysDesc();
    @endphp

    @forelse ($fotosByTahun as $tahun => $fotoTahunIni)
        <h5 class="mt-4 mb-3 border-bottom pb-2">Tahun {{ $tahun }}</h5>
        <div class="row">
            @foreach ($fotoTahunIni as $foto)
                <div class="col-md-3 mb-4">
                    <div class="card h-100 shadow-sm">
                        <img src="{{ Storage::url($foto->foto) }}" class="card-img-top" style="height:180px;object-fit:cover;" alt="{{ $foto->judul }}">
                        <div class="card-body">
                            <h6 class="card-title mb-1">{{ $foto->judul }}</h6>
                            @if ($foto->keterangan)
                                <p class="text-muted small mb-2">{{ Str::limit($foto->keterangan, 60) }}</p>
                            @endif

                            <div class="d-flex gap-2">
                                <a href="{{ route('admin.galeri-foto.edit', [$kategori, $foto]) }}" class="btn btn-sm btn-outline-secondary">Edit</a>
                                <form action="{{ route('admin.galeri-foto.destroy', [$kategori, $foto]) }}" method="POST"
                                      onsubmit="return confirm('Yakin hapus foto ini?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-outline-danger">Hapus</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @empty
        <p class="text-muted">Belum ada foto di kategori ini. Klik "Tambah Foto" untuk mulai mengisi album.</p>
    @endforelse
</div>
@endsection