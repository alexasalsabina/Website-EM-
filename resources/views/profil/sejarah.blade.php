@extends('layouts.app')

@section('title', 'Sejarah Desa')

@push('styles')
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500;600;700;800&display=swap" rel="stylesheet">

    @vite([
        'resources/css/sejarah.css',
    ])
@endpush

@section('content')
    <section class="sejarah" id="sejarah">
        <div class="sejarah__bg" style="background-image: url('{{ asset('images/sejarah-bg.jpg') }}');"></div>
        <div class="sejarah__overlay"></div>

        <div class="sejarah__inner">
            <h1 class="sejarah__title" data-reveal>Sejarah Desa Jatisari</h1>

            <div class="sejarah__card sejarah__card--right" data-reveal>
                <svg class="sejarah__leaf" viewBox="0 0 60 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M15 5C15 5 5 12 5 20C5 25 10 28 15 25C20 22 15 5 15 5Z" fill="#e8d98a" opacity="0.85"/>
                    <path d="M45 5C45 5 35 12 35 20C35 25 40 28 45 25C50 22 45 5 45 5Z" fill="#e8d98a" opacity="0.85"/>
                </svg>
                <p class="sejarah__text">
                    Desa Jatisari berdiri sejak masa kolonial dan berkembang dari
                    permukiman petani di lereng pegunungan. Seiring waktu, desa ini
                    tumbuh menjadi wilayah agraris yang dikenal akan hasil bumi dan
                    kekompakan warganya dalam menjaga tradisi gotong royong.
                </p>
            </div>

            <div class="sejarah__card sejarah__card--left" data-reveal>
                <p class="sejarah__text">
                    Pada dekade berikutnya, pembangunan infrastruktur dan pendidikan
                    mulai masuk ke Jatisari, membuka jalan bagi transformasi desa
                    menuju kawasan yang lebih maju tanpa meninggalkan nilai-nilai
                    kearifan lokal yang sudah diwariskan turun-temurun.
                </p>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
    @vite(['resources/js/sejarah.js'])
@endpush