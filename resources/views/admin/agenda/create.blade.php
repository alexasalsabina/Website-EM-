@extends('admin.layouts.app')

@section('title', 'Tambah Agenda')

@section('page-title', 'Tambah Agenda')

@section('content')

<div class="container-fluid agenda-create">

    {{-- Header --}}
    <div class="agenda-create__heading">

        <div>

            <h2 class="fw-bold mb-1">
                Tambah Agenda
            </h2>

            <p class="text-muted mb-0">
                Tambahkan agenda kegiatan Desa Jatisari.
            </p>

        </div>

        <a href="{{ route('admin.agenda.index') }}" class="berita-create__back">
            <span aria-hidden="true">←</span> Kembali
        </a>

    </div>


    {{-- Error Validation --}}
    @if ($errors->any())

        <div class="alert alert-danger">

            <ul class="mb-0">

                @foreach ($errors->all() as $error)

                    <li>{{ $error }}</li>

                @endforeach

            </ul>

        </div>

    @endif


    <form action="{{ route('admin.agenda.store') }}"
          method="POST"
          enctype="multipart/form-data">

        @csrf

        <div class="card shadow-sm border-0">

            <div class="card-body">

                <div class="row">

                    {{-- Judul Agenda --}}
                    <div class="col-md-12 mb-3">

                        <label class="form-label">
                            Judul Agenda
                        </label>

                        <input
                            type="text"
                            name="judul"
                            class="form-control"
                            value="{{ old('judul') }}"
                            required>

                    </div>


                    {{-- Lokasi --}}
                    <div class="col-md-6 mb-3">

                        <label class="form-label">
                            Lokasi
                        </label>

                        <input
                            type="text"
                            name="lokasi"
                            class="form-control"
                            value="{{ old('lokasi') }}"
                            required>

                    </div>


                    {{-- Penanggung Jawab --}}
                    <div class="col-md-6 mb-3">

                        <label class="form-label">
                            Penanggung Jawab
                        </label>

                        <input
                            type="text"
                            name="penanggung_jawab"
                            class="form-control"
                            value="{{ old('penanggung_jawab', Auth::user()->name) }}"
                            required>

                    </div>


                    {{-- Tanggal Mulai --}}
                    <div class="col-md-6 mb-3">

                        <label class="form-label">
                            Tanggal Mulai
                        </label>

                        <input
                            type="date"
                            name="tanggal_mulai"
                            class="form-control"
                            value="{{ old('tanggal_mulai') }}"
                            required>

                    </div>


                    {{-- Tanggal Selesai --}}
                    <div class="col-md-6 mb-3">

                        <label class="form-label">
                            Tanggal Selesai
                        </label>

                        <input
                            type="date"
                            name="tanggal_selesai"
                            class="form-control"
                            value="{{ old('tanggal_selesai') }}"
                            required>

                    </div>


                    {{-- Thumbnail --}}
                    <div class="col-md-12 mb-3">

                        <label class="form-label">
                            Thumbnail Agenda
                        </label>

                        <input
                            type="file"
                            name="thumbnail"
                            class="form-control"
                            accept="image/*">

                    </div>


                    {{-- Deskripsi --}}
                    <div class="col-md-12 mb-3">

                        <label class="form-label">
                            Deskripsi Agenda
                        </label>

                        <textarea
                            name="deskripsi"
                            rows="8"
                            class="form-control"
                            required>{{ old('deskripsi') }}</textarea>

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
                    class="btn btn-primary">

                    Simpan Agenda

                </button>

                <a
                    href="{{ route('admin.agenda.index') }}"
                    class="btn btn-secondary">

                    Batal

                </a>

            </div>

        </div>

    </form>

</div>

@endsection