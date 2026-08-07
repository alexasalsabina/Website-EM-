@extends('admin.layouts.app')

@section('content')
<div class="container-fluid">
    <h4 class="mb-4">Edit Kategori Galeri</h4>

    <form action="{{ route('admin.galeri-kategori.update', $kategori) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Nama Kategori</label>
            <input type="text" name="nama" value="{{ old('nama', $kategori->nama) }}"
                   class="form-control @error('nama') is-invalid @enderror">
            @error('nama')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('admin.galeri-kategori.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection