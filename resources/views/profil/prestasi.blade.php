@extends('layouts.app')

@section('title', 'Prestasi Desa Jatisari')

@push('styles')
    @vite(['resources/css/prestasi.css'])
@endpush

@section('content')
<section class="prestasi">
    <div class="prestasi__inner" data-page-animate>
        <x-section-heading
            eyebrow="Prestasi Desa"
            title="Pencapaian dan Penghargaan Desa Jatisari"
            subtitle="Desa Jatisari terus meraih pengakuan melalui inovasi masyarakat, agenda budaya, dan inisiatif pembangunan lokal yang berdampak."
        />

        <div class="prestasi__intro-callout">
            <span class="callout__label">Highlight Prestasi</span>
            <p class="callout__text">Desa Jatisari meraih penghargaan berkelanjutan di bidang pemerintahan, lingkungan, dan ekonomi, serta menjadi inspirasi desa mandiri yang menjaga budaya lokal.</p>
        </div>

        <div class="prestasi__summary">
            <x-metric-card value="8+" label="Penghargaan lokal dan desa berprestasi di tingkat kecamatan." />
            <x-metric-card value="5" label="Program UMKM dan inovasi pemuda yang mendapat dukungan dan pendampingan." />
            <x-metric-card value="3" label="Event budaya atau lingkungan dengan partisipasi aktif warga desa." />
        </div>

        <div class="prestasi__achievements">
            <div class="prestasi__awards-panel">
                <div class="prestasi__awards-grid">
                    <article class="prestasi__award-card">
                        <div class="award__media">
                            <img src="{{ asset('images/award-2024.jpg') }}" alt="Penghargaan 2024" />
                            <span class="award__year">2024</span>
                        </div>
                        <div class="award__body">
                            <span class="award__tag">PEMERINTAHAN</span>
                            <h4 class="award__title">Desa Terbaik I Tingkat Kabupaten</h4>
                            <p class="award__desc">Penghargaan atas kinerja pemerintah desa dalam pelayanan publik dan administrasi yang transparan.</p>
                        </div>
                    </article>

                <article class="prestasi__award-card">
                    <div class="award__media">
                        <img src="{{ asset('images/award-2023.jpg') }}" alt="Penghargaan 2023" />
                        <span class="award__year">2023</span>
                    </div>
                    <div class="award__body">
                        <span class="award__tag">PEMBANGUNAN</span>
                        <h4 class="award__title">Desa Mandiri Berprestasi</h4>
                        <p class="award__desc">Penghargaan atas keberhasilan Desa Jatisari dalam program pembangunan desa mandiri dan berkelanjutan.</p>
                    </div>
                </article>

                <article class="prestasi__award-card">
                    <div class="award__media">
                        <img src="{{ asset('images/award-2022.jpg') }}" alt="Penghargaan 2022" />
                        <span class="award__year">2022</span>
                    </div>
                    <div class="award__body">
                        <span class="award__tag">KESEJAHTERAAN</span>
                        <h4 class="award__title">Inovasi Desa Inspiratif</h4>
                        <p class="award__desc">Apresiasi atas inovasi program pemberdayaan masyarakat yang berdampak positif dan berkelanjutan.</p>
                    </div>
                </article>

                <article class="prestasi__award-card">
                    <div class="award__media">
                        <img src="{{ asset('images/award-2021.jpg') }}" alt="Penghargaan 2021" />
                        <span class="award__year">2021</span>
                    </div>
                    <div class="award__body">
                        <span class="award__tag">LINGKUNGAN</span>
                        <h4 class="award__title">Desa Peduli Lingkungan</h4>
                        <p class="award__desc">Penghargaan atas komitmen dalam menjaga kelestarian lingkungan dan pengelolaan sampah berbasis masyarakat.</p>
                    </div>
                </article>

                <article class="prestasi__award-card">
                    <div class="award__media">
                        <img src="{{ asset('images/award-2020.jpg') }}" alt="Penghargaan 2020" />
                        <span class="award__year">2020</span>
                    </div>
                    <div class="award__body">
                        <span class="award__tag">EKONOMI</span>
                        <h4 class="award__title">Pengelolaan Keuangan Desa Terbaik</h4>
                        <p class="award__desc">Penghargaan atas tata kelola keuangan desa yang akuntabel, transparan, dan tepat sasaran.</p>
                    </div>
                </article>
                </div>
            </div>
        </div>

        <div class="prestasi__note" data-page-animate>
            <h3>Prestasi yang Diberdayakan oleh Warga</h3>
            <p>Desa Jatisari membangun keberhasilan lewat kolaborasi komunitas, kegiatan budaya, dan inovasi lokal. Jika ada prestasi resmi dari desa yang ingin ditambahkan, kita bisa update halaman ini dengan data terbaru.</p>
        </div>
    </div>
</section>

@endsection