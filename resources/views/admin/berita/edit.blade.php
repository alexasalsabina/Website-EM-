@extends('admin.layouts.app')

@section('title', 'Edit Berita')

@section('page-title', 'Edit Berita')

@section('content')

<div class="container-fluid">

    {{-- Header --}}
    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>

            <h2 class="fw-bold mb-1">
                Edit Berita
            </h2>

            <p class="text-muted mb-0">
                Perbarui informasi berita Desa Jatisari.
            </p>

        </div>

        <a href="{{ route('admin.berita.index') }}" class="btn btn-secondary">
            ← Kembali
        </a>

    </div>


    {{-- Error Validation --}}
    @if($errors->any())

        <div class="alert alert-danger">

            <ul class="mb-0">

                @foreach($errors->all() as $error)

                    <li>{{ $error }}</li>

                @endforeach

            </ul>

        </div>

    @endif


    <form action="{{ route('admin.berita.update', $berita->id) }}"
          method="POST"
          enctype="multipart/form-data">

        @csrf
        @method('PUT')

        <div class="card shadow-sm border-0">

            <div class="card-body">

                <div class="row">

                    {{-- Judul --}}
                    <div class="col-md-12 mb-3">

                        <label class="form-label">
                            Judul Berita
                        </label>

                        <input
                            type="text"
                            name="judul"
                            class="form-control"
                            value="{{ old('judul', $berita->judul) }}"
                            required>

                    </div>


                    {{-- Penulis --}}
                    <div class="col-md-6 mb-3">

                        <label class="form-label">
                            Penulis
                        </label>

                        <input
                            type="text"
                            name="penulis"
                            class="form-control"
                            value="{{ old('penulis', $berita->penulis) }}"
                            required>

                    </div>


                    {{-- Kategori --}}
                    <div class="col-md-6 mb-3">

                        <label class="form-label">
                            Kategori
                        </label>

                        <select
                            name="kategori"
                            class="form-select">

                            <option value="Berita"
                                {{ old('kategori', $berita->kategori) == 'Berita' ? 'selected' : '' }}>
                                Berita
                            </option>

                            <option value="Artikel"
                                {{ old('kategori', $berita->kategori) == 'Artikel' ? 'selected' : '' }}>
                                Artikel
                            </option>

                            <option value="Opini"
                                {{ old('kategori', $berita->kategori) == 'Opini' ? 'selected' : '' }}>
                                Opini
                            </option>

                        </select>

                    </div>


                    {{-- Thumbnail Lama --}}
                    <div class="col-md-12 mb-3">

                        <label class="form-label">
                            Thumbnail Saat Ini
                        </label>

                        <br>

                        @if($berita->thumbnail)

                            <img
                                src="{{ asset('storage/' . $berita->thumbnail) }}"
                                class="img-thumbnail mb-3"
                                width="220">

                        @else

                            <p class="text-muted">
                                Belum ada thumbnail.
                            </p>

                        @endif

                    </div>


                    {{-- Upload Thumbnail Baru --}}
                    <div class="col-md-12 mb-3">

                        <label class="form-label">
                            Ganti Thumbnail
                        </label>

                        <input
                            type="file"
                            name="thumbnail"
                            class="form-control"
                            accept="image/*">

                        <small class="text-muted">
                            Kosongkan jika tidak ingin mengganti gambar.
                        </small>

                    </div>


                    {{-- Isi Berita --}}
                    <div class="col-md-12 mb-3">

                        <label class="form-label">
                            Isi Berita
                        </label>

                        <textarea
                            name="isi"
                            rows="12"
                            class="form-control"
                            required>{{ old('isi', $berita->isi) }}</textarea>

                    </div>


                    {{-- Status --}}
                    <div class="col-md-6 mb-4">

                        <label class="form-label">
                            Status
                        </label>

                        <select
                            name="status"
                            class="form-select">

                            <option value="publish"
                                {{ old('status', $berita->status) == 'publish' ? 'selected' : '' }}>
                                Publish
                            </option>

                            <option value="draft"
                                {{ old('status', $berita->status) == 'draft' ? 'selected' : '' }}>
                                Draft
                            </option>

                        </select>

                    </div>

                </div>

            </div>

            <div class="card-footer bg-white">

                <button
                    type="submit"
                    class="btn btn-primary">

                    Update Berita

                </button>

                <a
                    href="{{ route('admin.berita.index') }}"
                    class="btn btn-secondary">

                    Batal

                </a>

            </div>

        </div>

    </form>

</div>

@endsection