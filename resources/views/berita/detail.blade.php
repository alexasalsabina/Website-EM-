@extends('layouts.app')

@section('title', $berita->judul)

@push('styles')
    @vite(['resources/css/berita.css'])
@endpush

@section('content')
<section class="berita">
    <div class="berita__inner" style="max-width:800px;">

        <a href="{{ url()->previous() }}" style="display:inline-block;margin-bottom:20px;">&larr; Kembali</a>

        @if($berita->thumbnail)
            <img src="{{ asset('storage/'.$berita->thumbnail) }}"
                 alt="{{ $berita->judul }}"
                 style="width:100%;max-height:420px;object-fit:cover;border-radius:16px;margin-bottom:25px;">
        @endif

        <p style="color:#777;font-size:14px;margin-bottom:10px;">
            {{ $berita->kategori }} · {{ $berita->created_at->translatedFormat('d F Y') }} · {{ $berita->penulis }}
        </p>

        <h1 style="font-size:32px;font-weight:700;margin-bottom:25px;">
            {{ $berita->judul }}
        </h1>

        <div style="line-height:1.8;font-size:17px;">
            {!! $berita->isi !!}
        </div>

    </div>
</section>
@endsection