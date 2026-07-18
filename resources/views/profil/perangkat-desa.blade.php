<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perangkat Desa - Desa Jatisari</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500;600;700;800&display=swap" rel="stylesheet">

    @vite([
        'resources/css/homepage.css',
        'resources/css/perangkatdesa.css',
        'resources/js/homepage.js',
        'resources/js/perangkatdesa.js',
    ])
</head>
<body>

    @include('components.homepage.header')

    <section class="perangkat" id="perangkat">
        <div class="perangkat__bg" style="background-image: url('{{ asset('images/perangkat/bg.jpg') }}');"></div>
        <div class="perangkat__overlay"></div>

        <div class="perangkat__inner">

            <div class="perangkat__badge" data-reveal>
                <strong>Struktur Organisasi</strong>
                <span>Desa Jatisari</span>
            </div>

            <div class="orgchart-scroll">
                <div class="orgchart" data-reveal>
                    <ul>
                        <li>
                            <div class="org-person org-person--lead">
                                <img src="{{ asset('images/perangkat/kepala-desa.jpg') }}" alt="Kepala Desa" class="org-photo">
                                <span class="org-badge">
                                    <strong>Kepala Desa</strong>
                                    <small>Muhammad Baihaqi</small>
                                </span>
                            </div>

                            <ul>
                                <li>
                                    <div class="org-person">
                                        <img src="{{ asset('images/perangkat/kasi-pemerintahan.jpg') }}" alt="KASI Pemerintahan" class="org-photo">
                                        <span class="org-badge">
                                            <strong>KASI Pemerintahan</strong>
                                            <small>Adam Darmawan</small>
                                        </span>
                                    </div>
                                </li>
                                <li>
                                    <div class="org-person">
                                        <img src="{{ asset('images/perangkat/kasi-kesejahteraan.jpg') }}" alt="KASI Kesejahteraan" class="org-photo">
                                        <span class="org-badge">
                                            <strong>KASI Kesejahteraan</strong>
                                            <small>Nur Sa'at</small>
                                        </span>
                                    </div>
                                </li>
                                <li>
                                    <div class="org-person">
                                        <img src="{{ asset('images/perangkat/kasi-pelayanan.jpg') }}" alt="KASI Pelayanan" class="org-photo">
                                        <span class="org-badge">
                                            <strong>KASI Pelayanan</strong>
                                            <small>Nurul Khoiri</small>
                                        </span>
                                    </div>
                                </li>
                                <li>
                                    <div class="org-person">
                                        <img src="{{ asset('images/perangkat/kadus-mulyojati.jpg') }}" alt="Kepala Dusun Mulyojati" class="org-photo">
                                        <span class="org-badge">
                                            <strong>Kepala Dusun Mulyojati</strong>
                                            <small>Rizqi Pratama</small>
                                        </span>
                                    </div>
                                </li>
                                <li>
                                    <div class="org-person">
                                        <img src="{{ asset('images/perangkat/kadus-krajan.jpg') }}" alt="Kepala Dusun Krajan" class="org-photo">
                                        <span class="org-badge">
                                            <strong>Kepala Dusun Krajan</strong>
                                            <small>M. Nur Wahyudin</small>
                                        </span>
                                    </div>
                                </li>
                                <li>
                                    <div class="org-person org-person--lead">
                                        <img src="{{ asset('images/perangkat/sekretaris-desa.jpg') }}" alt="Sekretaris Desa" class="org-photo">
                                        <span class="org-badge">
                                            <strong>Sekretaris Desa</strong>
                                            <small>Muhammad Ma'ruf</small>
                                        </span>
                                    </div>

                                    <ul>
                                        <li>
                                            <div class="org-person">
                                                <img src="{{ asset('images/perangkat/kaur-tu.jpg') }}" alt="KAUR TU & Umum" class="org-photo">
                                                <span class="org-badge">
                                                    <strong>KAUR TU &amp; Umum</strong>
                                                    <small>Sofyan Rozaki</small>
                                                </span>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="org-person">
                                                <img src="{{ asset('images/perangkat/kaur-keuangan.jpg') }}" alt="KAUR Keuangan" class="org-photo">
                                                <span class="org-badge">
                                                    <strong>KAUR Keuangan</strong>
                                                    <small>Mahmudah</small>
                                                </span>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="org-person">
                                                <img src="{{ asset('images/perangkat/kaur-perencanaan.jpg') }}" alt="KAUR Perencanaan" class="org-photo">
                                                <span class="org-badge">
                                                    <strong>KAUR Perencanaan</strong>
                                                    <small>Ririn Anita Sari</small>
                                                </span>
                                            </div>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>

        </div>
    </section>

    @include('components.homepage.footer')

</body>
</html>