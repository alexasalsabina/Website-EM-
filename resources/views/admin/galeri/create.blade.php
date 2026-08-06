@extends('admin.layouts.app')

@section('content')
<div class="container-fluid">
    <h4 class="mb-4">Tambah Kategori Galeri</h4>

    <form action="{{ route('admin.galeri-kategori.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label class="form-label">Nama Kategori</label>
            <input type="text" name="nama" value="{{ old('nama') }}"
                   class="form-control @error('nama') is-invalid @enderror"
                   placeholder="Contoh: Kantor Desa">
            @error('nama')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('admin.galeri-kategori.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection