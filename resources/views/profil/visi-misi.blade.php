<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visi & Misi - Desa Jatisari</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500;600;700;800&display=swap" rel="stylesheet">

    @vite([
        'resources/css/homepage.css',
        'resources/css/visimisi.css',
        'resources/js/homepage.js',
        'resources/js/visimisi.js',
    ])
</head>
<body>

    @include('partials.header')

    <section class="visimisi" id="visimisi">
        <div class="visimisi__bg" style="background-image: url('{{ asset('images/jatisari.png') }}');"></div>
        <div class="visimisi__overlay"></div>

        <div class="visimisi__content">

            <div class="visimisi__block" data-reveal>
                <span class="visimisi__badge">visi</span>
                <blockquote class="visimisi__quote">
                    &ldquo;Desa Jatisari sebagai Desa Wisata yang mampu mengelolah potensi Desa dan
                    pembangunan berkelanjutan untuk mewujudkan masyarakat yang sejahtera&rdquo;
                </blockquote>
            </div>

            <div class="visimisi__block" data-reveal>
                <span class="visimisi__badge">Misi</span>
                <ol class="visimisi__list">
                    <li data-reveal>Mewujudkan tata kelola pemerintahan yang baik</li>
                    <li data-reveal>Mengembangkan kegiatan keagamaan</li>
                    <li data-reveal>Meningkatkan kualitas pendidikan dan sumber daya manusia</li>
                    <li data-reveal>Mengembangkan teknologi informasi</li>
                    <li data-reveal>Pembangunan infrastruktur, sarana dan prasarana</li>
                    <li data-reveal>Mengembangkan seluruh usaha potensi desa</li>
                    <li data-reveal>Meningkatkan kualitas dan membangun kesadaran kesehatan masyarakat</li>
                    <li data-reveal>Meningkatkan perekonomian dan kesejahteraan masyarakat</li>
                    <li data-reveal>Membangun kerjasama dan kemitraan strategis</li>
                </ol>
            </div>

        </div>
    </section>

    @include('partials.footer')

</body>
</html>