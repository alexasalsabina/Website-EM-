@extends('admin.layouts.app')

@section('title', 'Tambah Berita')

@section('page-title', 'Tambah Berita')

@section('content')

<div class="container-fluid">

    {{-- Header --}}
    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>

            <h2 class="fw-bold mb-1">
                Tambah Berita
            </h2>

            <p class="text-muted mb-0">
                Tambahkan berita baru untuk website Desa Jatisari.
            </p>

        </div>

        <a href="{{ route('admin.berita.index') }}" class="btn btn-secondary">

            ← Kembali

        </a>

    </div>


    {{-- Error --}}
    @if($errors->any())

        <div class="alert alert-danger">

            <ul class="mb-0">

                @foreach($errors->all() as $error)

                    <li>{{ $error }}</li>

                @endforeach

            </ul>

        </div>

    @endif


    <form action="{{ route('admin.berita.store') }}"
          method="POST"
          enctype="multipart/form-data">

        @csrf

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
                            value="{{ old('judul') }}"
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
                            value="{{ old('penulis', Auth::user()->name) }}"
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

                            <option value="Berita">Berita</option>

                            <option value="Artikel">Artikel</option>

                            <option value="Opini">Opini</option>

                        </select>

                    </div>


                    {{-- Thumbnail --}}
                    <div class="col-md-12 mb-3">

                        <label class="form-label">

                            Thumbnail

                        </label>

                        <input
                            type="file"
                            name="thumbnail"
                            class="form-control"
                            accept="image/*">

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
                            required>{{ old('isi') }}</textarea>

                    </div>


                    {{-- Status --}}
                    <div class="col-md-6 mb-4">

                        <label class="form-label">

                            Status

                        </label>

                        <select
                            name="status"
                            class="form-select">

                            <option value="publish">

                                Publish

                            </option>

                            <option value="draft">

                                Draft

                            </option>

                        </select>

                    </div>

                </div>

            </div>

            <div class="card-footer bg-white">

                <button
                    type="submit"
                    class="btn btn-success">

                    Simpan Berita

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