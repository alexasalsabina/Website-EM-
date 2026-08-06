@extends('layouts.app')

@section('title', 'Berita Desa Jatisari')

@push('styles')
    @vite(['resources/css/berita.css'])
@endpush

@section('content')
<section class="berita">
    <div class="berita__inner">
        <x-section-heading
            eyebrow="Berita"
            title="Kabar Terbaru Desa Jatisari"
            subtitle="Berita dan pengumuman penting yang dirancang agar mudah dibaca dan cepat diakses oleh warga desa."
        />

        <div class="berita__tabbar" role="tablist" aria-label="Kategori berita">
            <button type="button" id="berita-tab-terbaru" class="berita__tab" data-berita-tab="terbaru" role="tab" aria-controls="panel-terbaru" aria-selected="false">Terbaru</button>
            <button type="button" id="berita-tab-populer" class="berita__tab" data-berita-tab="populer" role="tab" aria-controls="panel-populer" aria-selected="false">Populer</button>
            <button type="button" id="berita-tab-agenda" class="berita__tab" data-berita-tab="agenda" role="tab" aria-controls="panel-agenda" aria-selected="false">Agenda</button>
            <span class="berita__tab-indicator" aria-hidden="true"></span>
        </div>

        <div class="berita__top">
            <div class="berita__hero" data-berita-panel="terbaru" id="panel-terbaru" role="tabpanel" aria-labelledby="berita-tab-terbaru">
                <x-article-card
                    href="javascript:void(0)"
                    image="images/jatisari.png"
                    date="01 Januari 2026"
                    title="Desa Jatisari Meningkatkan Akses Publik untuk Semua"
                    excerpt="Program pelayanan warga diluncurkan untuk mempercepat administrasi, memperkuat data kependudukan, dan membuka dialog warga dengan perangkat desa."
                    class="article-card--hero"
                />
            </div>

            <div class="berita__hero" data-berita-panel="populer" id="panel-populer" role="tabpanel" aria-labelledby="berita-tab-populer">
                <x-article-card
                    href="javascript:void(0)"
                    image="images/jatisari.png"
                    date="21 Januari 2026"
                    title="UMKM Desa Jatisari Terbaik Jadi Tamu Khusus Pasar Regional"
                    excerpt="Produk lokal dan pelaku usaha desa mendapat perhatian besar setelah pelatihan branding yang sukses dan dukungan pemasaran digital."
                    class="article-card--hero"
                />
            </div>

            <div class="berita__hero" data-berita-panel="agenda" id="panel-agenda" role="tabpanel" aria-labelledby="berita-tab-agenda">
                <x-article-card
                    href="javascript:void(0)"
                    image="images/jatisari.png"
                    date="05 Maret 2026"
                    title="Agenda Desa: Festival Murid, Gotong Royong, dan Pasar Seni"
                    excerpt="Jadwal lengkap acara desa ditampilkan untuk memudahkan semua warga mengikuti kegiatan budaya, olahraga, dan ekonomi kreatif."
                    class="article-card--hero"
                />
            </div>

            <aside class="berita__sidebar" aria-label="Headline terbaru">
                <div class="berita__sidebar-card">
                    <p class="berita__sidebar-title">Headline Terbaru</p>
                    <ul class="berita__headline-list">
                        <li>
                            <a href="javascript:void(0)" class="berita__headline-item">
                                <span class="berita__headline-date">28 Feb 2026</span>
                                <strong>Festival Kebudayaan Desa Sukses Menjadi Magnet Wisata Lokal</strong>
                            </a>
                        </li>
                        <li>
                            <a href="javascript:void(0)" class="berita__headline-item">
                                <span class="berita__headline-date">14 Feb 2026</span>
                                <strong>Pemberdayaan UMKM: Pelatihan Digital dan Branding Produk Lokal</strong>
                            </a>
                        </li>
                        <li>
                            <a href="javascript:void(0)" class="berita__headline-item">
                                <span class="berita__headline-date">03 Feb 2026</span>
                                <strong>Gerakan Kebersihan Desa: Gotong Royong Menuju Lingkungan Sehat</strong>
                            </a>
                        </li>
                        <li>
                            <a href="javascript:void(0)" class="berita__headline-item">
                                <span class="berita__headline-date">30 Jan 2026</span>
                                <strong>Pencanangan Ruang Publik Baru untuk Belajar dan Olahraga</strong>
                            </a>
                        </li>
                    </ul>
                </div>
            </aside>
        </div>

        <div class="berita__cards">
            <x-article-card
                href="javascript:void(0)"
                image="images/jatisari.png"
                date="28 Februari 2026"
                title="Festival Kebudayaan Desa Sukses Menjadi Magnet Wisata Lokal"
                excerpt="Desa Jatisari menarik pengunjung dengan pertunjukan seni, kuliner lokal, dan pameran produk UMKM yang digelar bersama warga."
            />

            <x-article-card
                href="javascript:void(0)"
                image="images/jatisari.png"
                date="14 Februari 2026"
                title="Pemberdayaan UMKM: Pelatihan Digital dan Branding Produk Lokal"
                excerpt="Pelatihan pemasaran online bagi pelaku usaha desa membantu mereka menjangkau pasar lebih luas dengan citra produk yang lebih kuat."
            />

            <x-article-card
                href="javascript:void(0)"
                image="images/jatisari.png"
                date="03 Februari 2026"
                title="Gerakan Kebersihan Desa: Gotong Royong Menuju Lingkungan Sehat"
                excerpt="Warga desa bekerja sama membersihkan lingkungan, mengelola sampah, dan menghidupkan ruang publik hijau untuk anak-anak dan keluarga."
            />

            <x-article-card
                href="javascript:void(0)"
                image="images/jatisari.png"
                date="30 Januari 2026"
                title="Pencanangan Ruang Publik Baru untuk Belajar dan Olahraga"
                excerpt="Pencanangan ruang publik baru di desa bertujuan untuk memberikan tempat yang nyaman bagi warga untuk belajar dan berolahraga."
            />
        </div>
    </div>
</section>
@endsection
