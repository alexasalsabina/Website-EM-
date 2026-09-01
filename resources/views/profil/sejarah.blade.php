@extends('layouts.app')

@section('title', 'Sejarah Desa')

@php
    // Data tokoh — ganti 'photo' dengan path foto asli tiap tokoh kalau ada
    $tokohList = [
        ['name' => "KH. Abdul Wahab", 'role' => 'Buyut Timah', 'photo' => null],
        ['name' => 'Buyut Sareh', 'role' => null, 'photo' => null],
        ['name' => 'Buyut Marwie', 'role' => null, 'photo' => null],
        ['name' => "Buyut Jum'ah", 'role' => null, 'photo' => null],
        ['name' => 'Buyut Landou', 'role' => null, 'photo' => null],
        ['name' => 'Mbah Sambisari', 'role' => null, 'photo' => null],
        ['name' => 'Mbah Jagopati', 'role' => 'Syeh Mahmud bin Yusuf', 'photo' => null],
    ];
@endphp

@push('styles')
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    @vite([
        'resources/css/sejarah.css',
    ])
@endpush

@section('content')
    <section class="sejarah" id="sejarah">

        <div class="sejarah__inner">

            {{-- ===== HERO: Judul + Quote (kiri) & Foto (kanan) ===== --}}
            <div class="sejarah__hero" data-reveal>
                <div class="sejarah__hero-left">
                    <h1 class="sejarah__title">
                        Sejarah <span>Desa Jatisari</span>
                    </h1>
                    <p class="sejarah__subtitle">
                        Mengenal lebih dalam tentang asal-usul, perkembangan, dan tokoh-tokoh
                        yang membentuk Desa Jatisari.
                    </p>

                    <div class="sejarah__quote">
                        <span class="sejarah__quote-mark">&#8220;</span>
                        <p class="sejarah__quote-text">
                            Berdasarkan cerita rakyat, kampung ini masih berupa hutan belantara
                            penuh pohon jati.
                        </p>
                        <span class="sejarah__quote-source">— Cerita Rakyat Desa Jatisari</span>
                    </div>
                </div>

                <div class="sejarah__hero-right">
                    <div class="sejarah__photo">
                        <img src="{{ asset('images/kantor desa.jpg') }}" alt="Kantor Desa Jatisari">
                        <div class="sejarah__photo-badge">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M12 2l2.4 6.6L21 11l-6.6 2.4L12 20l-2.4-6.6L3 11l6.6-2.4L12 2z" fill="currentColor"/>
                            </svg>
                            <span>Kantor Desa Jatisari</span>
                        </div>
                    </div>
                </div>
            </div>

            {{-- ===== ASAL-USUL DESA JATISARI ===== --}}
            <div class="sejarah__card" data-reveal>
                <h2 class="sejarah__card-title">
                    <span>Asal-usul Desa Jatisari</span>
                </h2>

                <div class="sejarah__origin">
                    <div class="sejarah__origin-icons">
                        <div class="sejarah__origin-item">
                            <div class="sejarah__origin-icon">
                                <svg width="22" height="22" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M12 2C9 2 7 5 7 8c0 2 1 3 1 3s-3 1-3 5c0 3 2 4 3 4h8c1 0 3-1 3-4 0-4-3-5-3-5s1-1 1-3c0-3-2-6-5-6z" stroke="currentColor" stroke-width="1.5"/>
                                    <path d="M12 22v-6" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>
                                </svg>
                            </div>
                            <p>
                                Berdasarkan cerita rakyat, pada masa/zaman kerajaan Belanda yang
                                dipimpin seorang Ratu bernama Yuliana, anak Wihelmina dari Belanda,
                                kampung ini masih berupa hutan belantara penuh pohon jati.
                            </p>
                        </div>

                        <div class="sejarah__origin-item">
                            <div class="sejarah__origin-icon">
                                <svg width="22" height="22" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <circle cx="12" cy="7" r="3" stroke="currentColor" stroke-width="1.5"/>
                                    <path d="M5 21c0-4 3-6 7-6s7 2 7 6" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>
                                </svg>
                            </div>
                            <p>
                                Kemudian datang beberapa orang dari Pati Jawa Tengah: KH. Abdul Wahab
                                (Buyut Timah), Buyut Sareh, dan Buyut Marwie. Mereka membabat alas
                                bersama sampai berkembang menjadi sebuah perkampungan.
                            </p>
                        </div>

                        <div class="sejarah__origin-item">
                            <div class="sejarah__origin-icon">
                                <svg width="22" height="22" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M3 21h18M5 21V10l7-5 7 5v11M9 21v-6h6v6" stroke="currentColor" stroke-width="1.5" stroke-linejoin="round"/>
                                </svg>
                            </div>
                            <p>
                                Desa Jatisari dinamakan demikian karena mengambil nama dari Hutan
                                Jati (alas jati) yang pada masa itu ditebang habis hingga tinggal
                                'sarinya'.
                            </p>
                        </div>
                    </div>

                    <div class="sejarah__origin-text">
                        <p>
                            Setelah hutan habis dibabat dan situasi berubah menjadi kampung,
                            datang lagi Buyut Jum'ah, Mbah Landou, Mbah Sambisari, dan yang
                            terakhir Syeh Mahmud bin Yusuf yang lebih dikenal sebagai Mbah
                            Jagopati dari Serang Banten.
                        </p>
                    </div>
                </div>
            </div>

            {{-- ===== DUSUN DI DESA JATISARI ===== --}}
            <div class="sejarah__section" data-reveal>
                <h2 class="sejarah__section-title">Dusun di Desa Jatisari</h2>

                <div class="sejarah__grid">

                    <div class="sejarah__grid-item">
                        <div class="sejarah__grid-icon">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M3 21h18M4 21V9l8-6 8 6v12M9 21v-6h6v6" stroke="currentColor" stroke-width="1.5" stroke-linejoin="round"/>
                            </svg>
                        </div>
                        <h3>Dusun Krajan</h3>
                        <p>
                            Menjadi pusat pemerintahan desa dan kumpulan beberapa kampung
                            seperti Kampung Tengah, Kampung Jaten, dan Kampung Santren.
                        </p>
                    </div>

                    <div class="sejarah__grid-item">
                        <div class="sejarah__grid-icon">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M4 8h16M6 8V6a2 2 0 012-2h8a2 2 0 012 2v2M4 8l1 12h14l1-12" stroke="currentColor" stroke-width="1.5" stroke-linejoin="round"/>
                            </svg>
                        </div>
                        <h3>Dusun Mulyojati</h3>
                        <p>
                            Merupakan kumpulan kampung seperti Kampung Japanan, Kampung Telon,
                            Kampung Etan Kali, dan Kampung Kandangan.
                        </p>
                    </div>

                    <div class="sejarah__grid-item">
                        <div class="sejarah__grid-icon">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <circle cx="8" cy="8" r="3" stroke="currentColor" stroke-width="1.5"/>
                                <circle cx="16" cy="8" r="3" stroke="currentColor" stroke-width="1.5"/>
                                <path d="M2 20c0-3 2.5-5 6-5s6 2 6 5M10 20c0-3 2.5-5 6-5s6 2 6 5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>
                            </svg>
                        </div>
                        <h3>Tokoh-tokoh di Desa Jatisari</h3>
                        <p>
                            Berikut adalah tokoh-tokoh yang berperan besar dalam sejarah
                            Desa Jatisari:
                        </p>

                        <button type="button" class="sejarah__tokoh-btn" data-tokoh-open>
                            Lihat Daftar Tokoh
                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M9 6l6 6-6 6" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </button>
                    </div>

                    <div class="sejarah__grid-item">
                        <div class="sejarah__grid-icon">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M12 2l3 5 6 1-4.5 4 1 6L12 15l-5.5 3 1-6L3 8l6-1 3-5z" stroke="currentColor" stroke-width="1.5" stroke-linejoin="round"/>
                            </svg>
                        </div>
                        <h3>Warisan dan Nilai</h3>
                        <p>
                            Nilai-nilai luhur dan semangat kebersamaan yang diwariskan oleh
                            para leluhur terus dijaga dan dilestarikan hingga saat ini.
                        </p>
                    </div>

                </div>
            </div>

        </div>

        {{-- ===== MODAL: DAFTAR TOKOH (overlay blur + carousel geser) ===== --}}
        <div class="tokoh-modal" data-tokoh-modal aria-hidden="true">
            <div class="tokoh-modal__overlay" data-tokoh-close></div>

            <div class="tokoh-modal__panel" role="dialog" aria-modal="true" aria-labelledby="tokohModalTitle">
                <div class="tokoh-modal__header">
                    <h3 id="tokohModalTitle">Tokoh-tokoh Desa Jatisari</h3>
                    <button type="button" class="tokoh-modal__close" data-tokoh-close aria-label="Tutup">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M6 6l12 12M18 6L6 18" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                        </svg>
                    </button>
                </div>

                <div class="tokoh-modal__track" data-tokoh-track>
                    @foreach ($tokohList as $tokoh)
                        <div class="tokoh-card">
                            <div class="tokoh-card__photo">
                                @if (!empty($tokoh['photo']))
                                    <img src="{{ asset($tokoh['photo']) }}" alt="{{ $tokoh['name'] }}" draggable="false">
                                @else
                                    <div class="tokoh-card__placeholder">
                                        <svg width="34" height="34" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <circle cx="12" cy="8" r="4" stroke="currentColor" stroke-width="1.5"/>
                                            <path d="M4 20c0-4 3.5-7 8-7s8 3 8 7" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>
                                        </svg>
                                    </div>
                                @endif
                            </div>
                            <h4 class="tokoh-card__name">{{ $tokoh['name'] }}</h4>
                            @if (!empty($tokoh['role']))
                                <span class="tokoh-card__role">{{ $tokoh['role'] }}</span>
                            @endif
                        </div>
                    @endforeach
                </div>

                <div class="tokoh-modal__hint">Geser untuk melihat tokoh lainnya</div>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
    @vite(['resources/js/sejarah.js'])
@endpush