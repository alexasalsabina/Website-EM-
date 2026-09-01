@extends('layouts.app')

@section('title', 'Inovasi Desa Jatisari')

@push('styles')
    @vite(['resources/css/inovasi.css'])
@endpush

@section('content')
<section class="inovasi">
    <div class="inovasi__inner">
        <x-section-heading
            eyebrow="Inovasi Desa"
            title="Inovasi dan Transformasi Desa Jatisari"
            subtitle="Desa Jatisari terus berkembang melalui inovasi berbasis komunitas: dari digitalisasi layanan desa, penguatan UMKM, hingga pengembangan pertanian modern dan pelatihan generasi muda."
        >
            <div class="inovasi__hero-image" data-page-animate>
                <img src="{{ asset('images/wisata.png') }}" alt="Inovasi Desa Jatisari" />
            </div>
        </x-section-heading>

        <div class="inovasi__cards">
            <x-feature-card
                href="#"
                label="Digitalisasi"
                title="Digitalisasi Layanan Desa"
                description="Penerapan sistem informasi desa untuk mempercepat layanan administrasi, data kependudukan, dan komunikasi antar warga serta perangkat desa."
            >
                <svg viewBox="0 0 24 24" width="24" height="24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M12 2l7 4.5v11L12 22 5 17.5v-11z" />
                    <path d="M12 22V12" />
                    <path d="M5 6.5l7 4 7-4" />
                </svg>
            </x-feature-card>

            <x-feature-card
                href="#"
                label="UMKM"
                title="UMKM & Kewirausahaan"
                description="Program pelatihan pemasaran digital dan kerajinan lokal yang mendukung usaha mikro desa agar dapat menjangkau pasar lebih luas."
            >
                <svg viewBox="0 0 24 24" width="24" height="24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M4 19h16" />
                    <path d="M4 15h16" />
                    <path d="M4 11h16" />
                    <path d="M4 7h16" />
                </svg>
            </x-feature-card>

            <x-feature-card
                href="#"
                label="Pertanian"
                title="Pertanian Modern"
                description="Inovasi pertanian dan hortikultura melalui pengairan lebih baik, pola tanam intensif, dan kolaborasi teknologi untuk hasil lebih produktif."
            >
                <svg viewBox="0 0 24 24" width="24" height="24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M12 3v18" />
                    <path d="M5 12h14" />
                    <path d="M7 8l5-5 5 5" />
                    <path d="M7 16l5 5 5-5" />
                </svg>
            </x-feature-card>

            <x-feature-card
                href="#"
                label="Pemuda"
                title="Pemberdayaan Pemuda"
                description="Kegiatan kreatif dan pelatihan yang menumbuhkan potensi pemuda lokal untuk berinovasi dalam budaya, ekonomi, dan lingkungan desa."
            >
                <svg viewBox="0 0 24 24" width="24" height="24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M4 22h16" />
                    <path d="M4 18h16" />
                    <path d="M12 2v16" />
                    <path d="M6 10h12" />
                </svg>
            </x-feature-card>
        </div>

        <div class="inovasi__section-grid">
            <div class="inovasi__section-card" data-page-animate>
                <h3>Smart Desa & Informasi Publik</h3>
                <p>Desa Jatisari sedang mengembangkan sistem informasi digital yang menghubungkan warga dengan pengumuman desa, layanan administrasi, dan data transparan.</p>
                <ul>
                    <li>Pengarsipan digital dokumen desa</li>
                    <li>Website desa dan update berita lokal</li>
                    <li>Dukungan informasi layanan RT/RW dan posyandu</li>
                </ul>
            </div>
            <div class="inovasi__section-card" data-page-animate>
                <h3>Inovasi Ekonomi Lokal</h3>
                <p>Peningkatan produktivitas UMKM melalui pelatihan pemasaran online, brand desa, dan pengembangan produk khas lokal.</p>
                <ul>
                    <li>Workshop kewirausahaan</li>
                    <li>Pemasaran digital untuk produk kerajinan</li>
                    <li>Kolaborasi antar pelaku usaha desa</li>
                </ul>
            </div>
            <div class="inovasi__section-card" data-page-animate>
                <h3>Lingkungan & Energi</h3>
                <p>Desa Jatisari fokus pada pengelolaan sampah, penghijauan, dan potensi energi terbarukan skala lokal untuk menjaga kualitas lingkungan.</p>
                <ul>
                    <li>Program penghijauan lingkungan</li>
                    <li>Pencemaran plastik dan sampah organik</li>
                    <li>Pemanfaatan energi ramah lingkungan</li>
                </ul>
            </div>
            <div class="inovasi__section-card" data-page-animate>
                <h3>Infrastruktur & Akses</h3>
                <p>Pemekaran jalan setapak, perbaikan drainase, dan akses jaringan untuk mendukung mobilitas warga serta mendukung kegiatan ekonomi desa.</p>
                <ul>
                    <li>Peningkatan kondisi jalan desa</li>
                    <li>Penguatan jaringan air bersih</li>
                    <li>Rencana dukungan internet desa</li>
                </ul>
            </div>
        </div>

        <div class="inovasi__note" data-page-animate>
            <h4>Catatan:</h4>
            <p>Halaman ini dirancang untuk menyoroti arah inovasi Desa Jatisari yang berbasis masyarakat, ekonomi lokal, dan keberlanjutan. Jika ada program nyata yang ingin ditambahkan, kita dapat memperbarui detailnya sesuai kondisi desa.</p>
        </div>
    </div>
</section>
@endsection