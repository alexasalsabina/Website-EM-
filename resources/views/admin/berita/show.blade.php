@extends('admin.layouts.app')

@section('title', 'Detail Berita')

@section('page-title', 'Detail Berita')

@section('content')

<div class="container-fluid">

    {{-- Header --}}
    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>

            <h2 class="fw-bold mb-1">
                Detail Berita
            </h2>

            <p class="text-muted mb-0">
                Informasi lengkap berita Desa Jatisari.
            </p>

        </div>

        <div>

            <a href="{{ route('admin.berita.edit', $berita->id) }}"
               class="btn btn-warning">
                Edit
            </a>

            <a href="{{ route('admin.berita.index') }}"
               class="btn btn-secondary">
                Kembali
            </a>

        </div>

    </div>


    <div class="card shadow-sm border-0">

        <div class="card-body">

            {{-- Thumbnail --}}
            @if($berita->thumbnail)

                <div class="text-center mb-4">

                    <img
                        src="{{ asset('storage/'.$berita->thumbnail) }}"
                        class="img-fluid rounded shadow"
                        style="max-height:400px;">

                </div>

            @endif


            {{-- Judul --}}
            <h2 class="fw-bold mb-3">

                {{ $berita->judul }}

            </h2>


            {{-- Informasi --}}
            <div class="row mb-4">

                <div class="col-md-3">

                    <strong>Penulis</strong>

                    <br>

                    {{ $berita->penulis }}

                </div>

                <div class="col-md-3">

                    <strong>Kategori</strong>

                    <br>

                    {{ $berita->kategori }}

                </div>

                <div class="col-md-3">

                    <strong>Status</strong>

                    <br>

                    @if($berita->status == 'publish')

                        <span class="badge bg-primary">
                            Publish
                        </span>

                    @else

                        <span class="badge bg-secondary">
                            Draft
                        </span>

                    @endif

                </div>

                <div class="col-md-3">

                    <strong>Tanggal</strong>

                    <br>

                    {{ $berita->created_at->format('d F Y') }}

                </div>

            </div>


            <hr>


            {{-- Isi Berita --}}
            <div class="mt-4">

                {!! $berita->isi !!}

            </div>

        </div>

    </div>

</div>

@endsection