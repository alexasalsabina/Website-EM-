@extends('admin.layouts.app')

@section('title', 'Detail Agenda')

@section('page-title', 'Detail Agenda')

@section('content')

<div class="container-fluid">

    {{-- Header --}}
    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>

            <h2 class="fw-bold mb-1">
                Detail Agenda
            </h2>

            <p class="text-muted mb-0">
                Informasi lengkap agenda Desa Jatisari.
            </p>

        </div>

        <div>

            <a href="{{ route('admin.agenda.edit', $agenda->id) }}"
               class="btn btn-warning">

                Edit

            </a>

            <a href="{{ route('admin.agenda.index') }}"
               class="btn btn-secondary">

                Kembali

            </a>

        </div>

    </div>


    <div class="card shadow-sm border-0">

        <div class="card-body">

            {{-- Thumbnail --}}
            @if($agenda->thumbnail)

                <div class="text-center mb-4">

                    <img
                        src="{{ asset('storage/'.$agenda->thumbnail) }}"
                        class="img-fluid rounded shadow"
                        style="max-height:400px;">

                </div>

            @endif


            {{-- Judul --}}
            <h2 class="fw-bold mb-4">

                {{ $agenda->judul }}

            </h2>


            <div class="row">

                <div class="col-md-6 mb-3">

                    <strong>Lokasi</strong>

                    <p>

                        {{ $agenda->lokasi }}

                    </p>

                </div>


                <div class="col-md-6 mb-3">

                    <strong>Penanggung Jawab</strong>

                    <p>

                        {{ $agenda->penanggung_jawab }}

                    </p>

                </div>


                <div class="col-md-6 mb-3">

                    <strong>Tanggal Mulai</strong>

                    <p>

                        {{ \Carbon\Carbon::parse($agenda->tanggal_mulai)->translatedFormat('d F Y') }}

                    </p>

                </div>


                <div class="col-md-6 mb-3">

                    <strong>Tanggal Selesai</strong>

                    <p>

                        {{ \Carbon\Carbon::parse($agenda->tanggal_selesai)->translatedFormat('d F Y') }}

                    </p>

                </div>


                <div class="col-md-6 mb-4">

                    <strong>Status</strong>

                    <p>

                        @if($agenda->status == 'publish')

                            <span class="badge bg-primary">

                                Publish

                            </span>

                        @else

                            <span class="badge bg-secondary">

                                Draft

                            </span>

                        @endif

                    </p>

                </div>

            </div>

            <hr>

            <h5 class="mb-3">

                Deskripsi Agenda

            </h5>

            <div class="lh-lg">

                {!! nl2br(e($agenda->deskripsi)) !!}

            </div>

        </div>

    </div>

</div>

@endsection