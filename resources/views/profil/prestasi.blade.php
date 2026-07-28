@extends('layouts.app')

@section('title', 'Prestasi Desa Jatisari')

@push('styles')
    @vite(['resources/css/prestasi.css'])
@endpush

@section('content')
<section class="prestasi">
    <div class="prestasi__inner">
        <x-section-heading
            eyebrow="Prestasi Desa"
            title="Pencapaian dan Penghargaan Desa Jatisari"
            subtitle="Desa Jatisari terus meraih pengakuan melalui inovasi masyarakat, agenda budaya, dan inisiatif pembangunan lokal yang berdampak."
        />

        <div class="prestasi__summary">
            <x-metric-card value="8+" label="Penghargaan lokal dan desa berprestasi di tingkat kecamatan." />
            <x-metric-card value="5" label="Program UMKM dan inovasi pemuda yang mendapat dukungan dan pendampingan." />
            <x-metric-card value="3" label="Event budaya atau lingkungan dengan partisipasi aktif warga desa." />
        </div>

        <div class="prestasi__achievements">
            <x-feature-card
                href="#"
                title="Juara Festival Budaya Desa"
                description="Desa Jatisari mendapat penghargaan atas partisipasi dan kreativitas dalam festival budaya tingkat kabupaten yang menampilkan seni tradisi dan kreasi pemuda."
            >
                <span class="prestasi__achievement-icon">🏆</span>
            </x-feature-card>

            <x-feature-card
                href="#"
                title="Penghargaan Lingkungan"
                description="Inisiatif penghijauan dan pengelolaan sampah desa mendapatkan pujian dari lembaga lingkungan setempat sebagai desa hijau yang proaktif."
            >
                <span class="prestasi__achievement-icon">🌿</span>
            </x-feature-card>

            <x-feature-card
                href="#"
                title="Program Inovasi UMKM"
                description="Program pelatihan pemasaran digital dan produk desa menjadi contoh best practice bagi desa lain dalam mendukung ekonomi lokal."
            >
                <span class="prestasi__achievement-icon">💡</span>
            </x-feature-card>
        </div>

        <div class="prestasi__note" data-page-animate>
            <h3>Prestasi yang Diberdayakan oleh Warga</h3>
            <p>Desa Jatisari membangun keberhasilan lewat kolaborasi komunitas, kegiatan budaya, dan inovasi lokal. Jika ada prestasi resmi dari desa yang ingin ditambahkan, kita bisa update halaman ini dengan data terbaru.</p>
        </div>
    </div>
</section>

@endsection