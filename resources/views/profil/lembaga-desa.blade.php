<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lembaga Desa - Desa Jatisari</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500;600;700;800&display=swap" rel="stylesheet">

    @vite([
        'resources/css/homepage.css',
        'resources/css/lembagadesa.css',
        'resources/js/homepage.js',
        'resources/js/lembagadesa.js',
    ])
</head>
<body>

    @include('components.homepage.header')

    <section class="lembaga" id="lembaga">
        <div class="lembaga__bg" style="background-image: url('{{ asset('images/lembaga-bg.jpg') }}');"></div>
        <div class="lembaga__overlay"></div>

        <div class="lembaga__inner">
            <p class="lembaga__eyebrow" data-reveal>Rangkup / Lembaga Desa</p>
            <h1 class="lembaga__title" data-reveal>Lembaga Desa</h1>

            <div class="lembaga__grid">
                <a href="{{ route('lembaga.lpm') }}" class="lembaga__card" data-reveal>
                    <span class="lembaga__name">LPM</span>
                    <span class="lembaga__desc">Lembaga Pemberdayaan Masyarakat</span>
                </a>

                <a href="{{ route('lembaga.pkk') }}" class="lembaga__card" data-reveal>
                    <span class="lembaga__name">PKK</span>
                    <span class="lembaga__desc">Pemberdayaan Kesejahteraan Keluarga</span>
                </a>

                <a href="{{ route('lembaga.karang-taruna') }}" class="lembaga__card" data-reveal>
                    <span class="lembaga__name">Karang Taruna</span>
                    <span class="lembaga__desc">Organisasi Kepemudaan Desa</span>
                </a>
            </div>
        </div>
    </section>

    @include('components.homepage.footer')

</body>
</html>