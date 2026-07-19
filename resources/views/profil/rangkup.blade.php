<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rangkup - Desa Jatisari</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500;600;700;800&display=swap" rel="stylesheet">

    @vite([
        'resources/css/homepage.css',
        'resources/css/rangkup.css',
        'resources/js/homepage.js',
        'resources/js/rangkup.js',
    ])
</head>
<body>

    @include('components.homepage.header')

    <section class="rangkup" id="rangkup">
        <div class="rangkup__bg" style="background-image: url('{{ asset('images/rangkup-bg.jpg') }}');"></div>
        <div class="rangkup__overlay"></div>

        <div class="rangkup__list">

            <a href="{{ route('profil.sejarah') }}" class="rangkup__card rangkup__card--left" data-reveal>
                <img src="{{ asset('images/rangkup1.png') }}" alt="" class="rangkup__icon">
                <span class="rangkup__text">
                    <span class="rangkup__title">Sejarah</span>
                    <span class="rangkup__desc">Sejarah Desa Jatisari</span>
                </span>
            </a>

            <a href="{{ route('profil.perangkat-desa') }}" class="rangkup__card rangkup__card--right" data-reveal>
                <span class="rangkup__text">
                    <span class="rangkup__title">Perangkat Desa</span>
                    <span class="rangkup__desc">Struktur Organisasi dan Aparatur Desa Jatisari</span>
                </span>
                <img src="{{ asset('images/rangkup3.png') }}" alt="" class="rangkup__icon">
            </a>

            <a href="{{ route('profil.bumdes') }}" class="rangkup__card rangkup__card--left" data-reveal>
                <img src="{{ asset('images/rangkup2.png') }}" alt="" class="rangkup__icon">
                <span class="rangkup__text">
                    <span class="rangkup__title">BUMDes</span>
                    <span class="rangkup__desc">Pengelolaan Usaha Desa Jatisari</span>
                </span>
            </a>

            <a href="{{ route('profil.lembaga-desa') }}" class="rangkup__card rangkup__card--right" data-reveal>
                <span class="rangkup__text">
                    <span class="rangkup__title">Lembaga Desa</span>
                    <span class="rangkup__desc">LPM, PKK, Karang Taruna, dan Lainnya</span>
                </span>
                <img src="{{ asset('images/rangkup4.png') }}" alt="" class="rangkup__icon">
            </a>

        </div>
    </section>

    @include('components.homepage.footer')

</body>
</html>