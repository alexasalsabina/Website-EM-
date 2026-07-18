<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Desa - Desa Jatisari</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500;600;700;800&family=Space+Mono:ital@0;1&display=swap" rel="stylesheet">

    {{-- homepage.css tetap dipakai supaya navbar & footer konsisten --}}
    @vite([
        'resources/css/homepage.css',
        'resources/css/profildesa.css',
        'resources/js/homepage.js',
        'resources/js/profildesa.js',
    ])
</head>
<body>

    <section class="profil-hero" id="profil-hero">
        <div class="profil-hero__bg" style="background-image: url('{{ asset('images/jatisari.png') }}');"></div>
        <div class="profil-hero__overlay"></div>

        @include('components.homepage.header')

        <div class="profil-hero__content">
            <p class="profil-hero__eyebrow" data-reveal>Profil Desa</p>
            <h1 class="profil-hero__title" data-reveal>JATISARI</h1>
            <p class="profil-hero__desc" data-reveal>
                Desa Jatisari merupakan salah satu desa yang terletak di wilayah
                Kecamatan Tajinan, Kabupaten Malang. Memiliki potensi alam
                dan budaya yang kaya, desa ini terus berkembang dalam bidang
                pendidikan, kesehatan, dan pariwisata.
            </p>

            <button class="profil-hero__search" id="searchToggle" data-reveal>
                <svg class="profil-hero__search-icon" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <circle cx="11" cy="11" r="7" stroke="currentColor" stroke-width="2"/>
                    <path d="M20 20L16.5 16.5" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                </svg>
                <span>Pencarian</span>
            </button>

            <form class="profil-hero__search-form" id="searchForm" action="{{ url('/search') }}" method="GET">
                <input type="text" name="q" placeholder="Cari informasi desa..." class="profil-hero__search-input" autocomplete="off">
            </form>
        </div>
    </section>

    <main>
        {{-- Konten lanjutan profil desa (peta wilayah, data penduduk, dll) taruh di sini --}}
    </main>

    @include('components.homepage.footer')

</body>
</html>