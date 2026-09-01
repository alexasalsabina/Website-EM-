@extends('layouts.app')

@section('content')
<div class="container py-5 text-white">
    <a href="{{ url('/profil/potensi') }}" class="btn btn-outline-light mb-4">
        ← Kembali ke Potensi Desa
    </a>

    <h1 class="mb-4 fw-bold">{{ $detail['judul'] }}</h1>

    <div class="row align-items-center">
        <div class="col-md-6 mb-4 mb-md-0">
            <img src="{{ asset($detail['gambar']) }}" alt="{{ $detail['judul'] }}" class="img-fluid rounded shadow-lg border border-secondary">
        </div>

        <div class="col-md-6">
            <div class="p-4 bg-dark bg-opacity-50 rounded border border-secondary">
                <h4 class="text-warning mb-3">Tentang {{ $detail['judul'] }}</h4>
                <p class="lead text-light mb-0" style="line-height: 1.8;">
                    {{ $detail['deskripsi'] }}
                </p>
            </div>
        </div>
    </div>
</div>
@endsection