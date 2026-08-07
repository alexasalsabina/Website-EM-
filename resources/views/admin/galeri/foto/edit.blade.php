@extends('admin.layouts.app')

@section('content')
<div class="container-fluid">
    <h4 class="mb-4">Edit Foto - {{ $kategori->nama }}</h4>

    <div class="mb-3">
        <img src="{{ Storage::url($foto->foto) }}" style="max-width:250px;" class="rounded shadow-sm">
    </div>

    <form action="{{ route('admin.galeri-foto.update', [$kategori, $foto]) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Judul</label>
            <input type="text" name="judul" value="{{ old('judul', $foto->judul) }}"
                   class="form-control @error('judul') is-invalid @enderror">
            @error('judul')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Tahun</label>
            <input type="number" name="tahun" value="{{ old('tahun', $foto->tahun) }}"
                   class="form-control @error('tahun') is-invalid @enderror"
                   min="1900" max="{{ date('Y') + 1 }}">
            @error('tahun')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Keterangan (opsional)</label>
            <textarea name="keterangan" rows="3" class="form-control @error('keterangan') is-invalid @enderror">{{ old('keterangan', $foto->keterangan) }}</textarea>
            @error('keterangan')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Ganti Foto (opsional)</label>
            <input type="file" name="foto" accept="image/*"
                   class="form-control @error('foto') is-invalid @enderror">
            @error('foto')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
            <small class="text-muted">Kosongkan jika tidak ingin mengganti foto.</small>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('admin.galeri-foto.index', $kategori) }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection