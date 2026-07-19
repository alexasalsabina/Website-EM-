@extends('layouts.app')

@section('title', 'HUT Desa Jatisari')

@push('styles')
    @vite(['resources/css/event-detail.css'])
@endpush

@section('content')
<section class="event-detail">
    <div class="event-detail__hero">
        <img src="{{ asset('images/hutdesa.png') }}" alt="HUT Desa Jatisari" class="event-detail__img">
    </div>

    <div class="event-detail__content">
        <h1 class="event-detail__title">HUT DESA JATISARI</h1>
        <p class="event-detail__meta">Dusun <strong>Jatisari</strong></p>

        <div class="event-detail__body">
            <p>
                Tuliskan cerita/deskripsi acara HUT Desa Jatisari di sini —
                kapan diadakan, rangkaian acaranya, siapa saja yang hadir, dll.
            </p>
        </div>

        {{-- Kalau nanti mau tambah galeri foto lain --}}
        {{--
        <div class="event-detail__gallery">
            <img src="{{ asset('images/hutdesa-2.png') }}" alt="">
            <img src="{{ asset('images/hutdesa-3.png') }}" alt="">
        </div>
        --}}
    </div>
</section>
@endsection