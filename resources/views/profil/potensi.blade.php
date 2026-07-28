@extends('layouts.app')

@section('title', 'Potensi Desa Jatisari')

@push('styles')
    @vite(['resources/css/potensi.css'])
@endpush

@section('content')
<section class="potensi">
    <div class="potensi__inner">
        <x-section-heading
            eyebrow="Potensi Desa"
            title="Potensi Unggulan Desa Jatisari"
            subtitle="Desa Jatisari memiliki kekayaan alam dan budaya yang kuat: pertanian produktif, wisata alam, potensi energi terbarukan, serta komunitas yang bersinergi untuk pemberdayaan masyarakat."
        />

        <div class="potensi__highlight">
            <x-feature-card
                href="#"
                label="Pertanian"
                title="Pertanian dan Hortikultura"
                description="Lahan subur di Jatisari mendukung tanaman pangan dan sayuran lokal, serta komoditas yang dapat menjadi sumber penghasilan tambahan bagi keluarga petani."
            >
                <svg viewBox="0 0 24 24" width="28" height="28" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M4 7h16v4H4z" />
                    <path d="M4 11v6a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2v-6" />
                    <path d="M8 11V5a4 4 0 0 1 8 0v6" />
                </svg>
            </x-feature-card>

            <x-feature-card
                href="#"
                label="Wisata"
                title="Wisata Alam & Budaya"
                description="Lingkungan asri, tradisi lokal, dan ruang publik desa memberi peluang wisata alam serta event kebudayaan yang menarik wisatawan sekitar."
            >
                <svg viewBox="0 0 24 24" width="28" height="28" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M21 15V8a2 2 0 0 0-2-2h-1V4a2 2 0 0 0-2-2H8a2 2 0 0 0-2 2v2H5a2 2 0 0 0-2 2v7" />
                    <path d="M3 12h18" />
                    <path d="M7 19h10" />
                    <path d="M9 15h6" />
                </svg>
            </x-feature-card>

            <x-feature-card
                href="#"
                label="UMKM"
                title="UMKM Kreatif"
                description="Usaha mikro dan kerajinan lokal terus berkembang dengan dukungan pelatihan, pemasaran digital, serta kolaborasi antar pelaku usaha desa."
            >
                <svg viewBox="0 0 24 24" width="28" height="28" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M4 7h16v12H4z" />
                    <path d="M8 7v12" />
                    <path d="M16 7v12" />
                    <path d="M4 11h16" />
                    <path d="M4 15h16" />
                </svg>
            </x-feature-card>

            <x-feature-card
                href="#"
                label="Pendidikan"
                title="Pendidikan & Keterampilan"
                description="Pusat belajar desa dan kegiatan literasi memperkuat talent lokal, menyiapkan generasi muda yang siap berinovasi dan berwirausaha."
            >
                <svg viewBox="0 0 24 24" width="28" height="28" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M4 20h16" />
                    <path d="M4 16h16" />
                    <path d="M8 16V4h8v12" />
                    <path d="M10 11h4" />
                </svg>
            </x-feature-card>
        </div>

        <div class="potensi__details">
            <div class="potensi__details-card" data-page-animate>
                <h3 class="potensi__details-title">Sumber Daya Alam</h3>
                <p class="potensi__details-text">Desa Jatisari berada di wilayah yang kaya dengan tanah subur serta potensi sumber daya air. Kondisi ini mendukung irigasi, pertanian berkelanjutan, dan pengembangan kebun sayur lokal.</p>
                <ul class="potensi__list">
                    <li class="potensi__list-item">Pengembangan tanaman pangan keluarga</li>
                    <li class="potensi__list-item">Rintisan hortikultura dan budidaya</li>
                    <li class="potensi__list-item">Potensi agroeduwisata dan pertanian modern</li>
                </ul>
            </div>
            <div class="potensi__details-card" data-page-animate>
                <h3 class="potensi__details-title">Sumber Daya Manusia</h3>
                <p class="potensi__details-text">Masyarakat aktif dan jaringan kelembagaan yang baik memperkuat inisiatif desa, mulai dari pelatihan UMKM hingga kegiatan pemuda dalam Karang Taruna.</p>
                <ul class="potensi__list">
                    <li class="potensi__list-item">Kolaborasi antar lembaga desa</li>
                    <li class="potensi__list-item">Pengembangan keterampilan dan kewirausahaan</li>
                    <li class="potensi__list-item">Potensi digitalisasi usaha desa</li>
                </ul>
            </div>
        </div>

        <div class="potensi__footer" data-page-animate>
            <h3 class="potensi__footer-title">Visi Pengembangan Potensi</h3>
            <p class="potensi__footer-text">Memperkuat potensi lokal Desa Jatisari melalui sinergi antara alam, budaya, dan komunitas, sehingga tercipta ekonomi desa yang mandiri, ramah lingkungan, dan berkelanjutan.</p>
        </div>
    </div>
</section>
@endsection