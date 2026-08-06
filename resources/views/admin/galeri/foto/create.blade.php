@extends('admin.layouts.app')

@section('content')
<div class="container-fluid">
    <h4 class="mb-4">Tambah Foto - {{ $kategori->nama }}</h4>

    <form action="{{ route('admin.galeri-foto.store', $kategori) }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label class="form-label">Judul</label>
            <input type="text" name="judul" value="{{ old('judul') }}"
                   class="form-control @error('judul') is-invalid @enderror"
                   placeholder="Contoh: Renovasi Tahap 2">
            @error('judul')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Tahun</label>
            <input type="number" name="tahun" value="{{ old('tahun') }}"
                   class="form-control @error('tahun') is-invalid @enderror"
                   placeholder="Contoh: 2020" min="1900" max="{{ date('Y') + 1 }}">
            @error('tahun')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Keterangan (opsional)</label>
            <textarea name="keterangan" rows="3" class="form-control @error('keterangan') is-invalid @enderror">{{ old('keterangan') }}</textarea>
            @error('keterangan')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Foto</label>
            <input type="file" name="foto" accept="image/*"
                   class="form-control @error('foto') is-invalid @enderror">
            @error('foto')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
            <small class="text-muted">Format: JPG/PNG, maks 4MB.</small>
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('admin.galeri-foto.index', $kategori) }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection