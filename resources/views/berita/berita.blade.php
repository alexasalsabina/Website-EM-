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

        @if($beritas->count() > 0)

<<<<<<< HEAD
=======

>>>>>>> d2435a78a8c32de77e7fc798e9a0db84e0851cab
            @php
                $hero = $beritas->first();
            @endphp

            <div class="berita__top">
                <div class="berita__hero is-active">
                    <x-article-card
                        href="{{ route('berita.detail', $hero->slug) }}"
                        image="{{ $hero->thumbnail ? asset('storage/'.$hero->thumbnail) : 'images/jatisari.png' }}"
                        date="{{ $hero->created_at->translatedFormat('d F Y') }}"
                        title="{{ $hero->judul }}"
                        excerpt="{{ Str::limit(strip_tags($hero->isi), 160) }}"
                        class="article-card--hero"
                    />
<<<<<<< HEAD
                </div>

=======

        <div class="berita__top">
            <div class="berita__hero" data-berita-panel="terbaru" id="panel-terbaru" role="tabpanel" aria-labelledby="berita-tab-terbaru">
                <x-article-card
                    href="javascript:void(0)"
                    date="01 Januari 2026"
                    title="Desa Jatisari Meningkatkan Akses Publik untuk Semua"
                    excerpt="Program pelayanan warga diluncurkan untuk mempercepat administrasi, memperkuat data kependudukan, dan membuka dialog warga dengan perangkat desa."
                    class="article-card--hero"
                />
            </div>

            <div class="berita__hero" data-berita-panel="populer" id="panel-populer" role="tabpanel" aria-labelledby="berita-tab-populer">
                <x-article-card
                    href="javascript:void(0)"
                    date="21 Januari 2026"
                    title="UMKM Desa Jatisari Terbaik Jadi Tamu Khusus Pasar Regional"
                    excerpt="Produk lokal dan pelaku usaha desa mendapat perhatian besar setelah pelatihan branding yang sukses dan dukungan pemasaran digital."
                    class="article-card--hero"
                />
            </div>

            <div class="berita__hero" data-berita-panel="agenda" id="panel-agenda" role="tabpanel" aria-labelledby="berita-tab-agenda">
                <x-article-card
                    href="javascript:void(0)"
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
>
                </div>


>>>>>>> d2435a78a8c32de77e7fc798e9a0db84e0851cab
                <aside class="berita__sidebar" aria-label="Headline terbaru">
                    <div class="berita__sidebar-card">
                        <p class="berita__sidebar-title">Headline Terbaru</p>
                        <ul class="berita__headline-list">
                            @foreach($beritas->skip(1)->take(4) as $item)
                                <li>
                                    <a href="{{ route('berita.detail', $item->slug) }}" class="berita__headline-item">
                                        <span class="berita__headline-date">{{ $item->created_at->translatedFormat('d M Y') }}</span>
                                        <strong>{{ $item->judul }}</strong>
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </aside>
            </div>

            <div class="berita__cards">
                @foreach($beritas->skip(1) as $berita)
                    <x-article-card
                        href="{{ route('berita.detail', $berita->slug) }}"
                        image="{{ $berita->thumbnail ? asset('storage/'.$berita->thumbnail) : 'images/jatisari.png' }}"
                        date="{{ $berita->created_at->translatedFormat('d F Y') }}"
                        title="{{ $berita->judul }}"
                        excerpt="{{ Str::limit(strip_tags($berita->isi), 140) }}"
                    />
                @endforeach
            </div>

            <div class="mt-6">
                {{ $beritas->links() }}
            </div>

        @else
            <div class="berita__empty text-center py-10">
                <p class="text-gray-500">Belum ada berita yang dipublikasikan.</p>
            </div>
        @endif
<<<<<<< HEAD
=======


        <div class="berita__cards">
            <x-article-card
                href="javascript:void(0)"
                date="28 Februari 2026"
                title="Festival Kebudayaan Desa Sukses Menjadi Magnet Wisata Lokal"
                excerpt="Desa Jatisari menarik pengunjung dengan pertunjukan seni, kuliner lokal, dan pameran produk UMKM yang digelar bersama warga."
            />

            <x-article-card
                href="javascript:void(0)"
                date="14 Februari 2026"
                title="Pemberdayaan UMKM: Pelatihan Digital dan Branding Produk Lokal"
                excerpt="Pelatihan pemasaran online bagi pelaku usaha desa membantu mereka menjangkau pasar lebih luas dengan citra produk yang lebih kuat."
            />

            <x-article-card
                href="javascript:void(0)"
                date="03 Februari 2026"
                title="Gerakan Kebersihan Desa: Gotong Royong Menuju Lingkungan Sehat"
                excerpt="Warga desa bekerja sama membersihkan lingkungan, mengelola sampah, dan menghidupkan ruang publik hijau untuk anak-anak dan keluarga."
            />

            <x-article-card
                href="javascript:void(0)"
                date="30 Januari 2026"
                title="Pencanangan Ruang Publik Baru untuk Belajar dan Olahraga"
                excerpt="Pencanangan ruang publik baru di desa bertujuan untuk memberikan tempat yang nyaman bagi warga untuk belajar dan berolahraga."
            />
        </div>

>>>>>>> d2435a78a8c32de77e7fc798e9a0db84e0851cab
    </div>
</section>
@endsection