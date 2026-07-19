@extends('layouts.app')

@section('title', 'Karnaval Desa Jatisari')

@push('styles')
    @vite(['resources/css/event-detail.css'])
@endpush

@section('content')
<section class="event-detail">
    <div class="event-detail__hero">
        <img src="{{ asset('images/karnaval.png') }}" alt="Karnaval Desa Jatisari" class="event-detail__img">
    </div>

    <div class="event-detail__content">
        <h1 class="event-detail__title">KARNAVAL DESA JATISARI</h1>
        <p class="event-detail__meta">Dusun <strong>Jatisari</strong></p>

        <div class="event-detail__body">
            <p>
                Tuliskan cerita/deskripsi acara Karnaval Desa Jatisari di sini —
                kapan diadakan, rute karnaval, jumlah peserta, dll.
            </p>
        </div>
    </div>
</section>
@endsection