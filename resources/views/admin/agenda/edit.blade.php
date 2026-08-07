@extends('admin.layouts.app')

@section('title', 'Edit Agenda')

@section('page-title', 'Edit Agenda')

@section('content')

<div class="container-fluid">

    {{-- Header --}}
    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>

            <h2 class="fw-bold mb-1">
                Edit Agenda
            </h2>

            <p class="text-muted mb-0">
                Perbarui informasi agenda Desa Jatisari.
            </p>

        </div>

        <a href="{{ route('admin.agenda.index') }}" class="btn btn-secondary">
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


    <form action="{{ route('admin.agenda.update', $agenda->id) }}"
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
                            Judul Agenda
                        </label>

                        <input
                            type="text"
                            name="judul"
                            class="form-control"
                            value="{{ old('judul', $agenda->judul) }}"
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
                            value="{{ old('lokasi', $agenda->lokasi) }}"
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
                            value="{{ old('penanggung_jawab', $agenda->penanggung_jawab) }}"
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
                            value="{{ old('tanggal_mulai', \Carbon\Carbon::parse($agenda->tanggal_mulai)->format('Y-m-d')) }}"
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
                            value="{{ old('tanggal_selesai', \Carbon\Carbon::parse($agenda->tanggal_selesai)->format('Y-m-d')) }}"
                            required>

                    </div>


                    {{-- Thumbnail Lama --}}
                    <div class="col-md-12 mb-3">

                        <label class="form-label">
                            Thumbnail Saat Ini
                        </label>

                        <br>

                        @if($agenda->thumbnail)

                            <img
                                src="{{ asset('storage/'.$agenda->thumbnail) }}"
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


                    {{-- Deskripsi --}}
                    <div class="col-md-12 mb-3">

                        <label class="form-label">
                            Deskripsi Agenda
                        </label>

                        <textarea
                            name="deskripsi"
                            rows="8"
                            class="form-control"
                            required>{{ old('deskripsi', $agenda->deskripsi) }}</textarea>

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
                                {{ old('status', $agenda->status) == 'publish' ? 'selected' : '' }}>
                                Publish
                            </option>

                            <option value="draft"
                                {{ old('status', $agenda->status) == 'draft' ? 'selected' : '' }}>
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

                    Update Agenda

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