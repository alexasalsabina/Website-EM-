@extends('layouts.app')

@section('title', 'Event Desa Jatisari')

@push('styles')
    @vite(['resources/css/event.css'])
@endpush

@section('content')
<section class="event">
    {{-- Hero Banner Full Width Tanpa Gap & Bergradasi Smooth ke Atas --}}
    <div class="event__hero-banner" style="background-image: url('{{ asset('images/karnaval.png') }}');">
        <div class="event__hero-banner-content">
            <h1 class="event__hero-banner-title">Event Desa</h1>
            <p class="event__hero-banner-subtitle">Informasi lengkap mengenai kegiatan dan acara yang diselenggarakan di Desa Jatisari.</p>
            <a href="#agenda" class="btn btn--primary">Jelajahi Event</a>
        </div>
    </div>

    <div class="event__inner">
        {{-- Section 1: Agenda Kegiatan Desa (Header Tengah) --}}
        <div id="agenda" class="event__section">
            <div class="event__section-header event__section-header--center">
                <h2 class="event__section-title">Agenda Kegiatan Desa</h2>
                <span class="event__section-divider"></span>
                <p class="event__section-subtitle">Berbagai kegiatan menarik yang akan datang di Desa Jatisari</p>
            </div>

            <div class="event__cards event__cards--grid4">
                <div class="event__item-card">
                    <div class="event__item-img-wrapper">
                        <img src="{{ asset('images/karnaval.png') }}" alt="Lomba Kemerdekaan Desa">
                        <div class="event__date-badge">
                            <span class="event__date-badge-day">17</span>
                            <span class="event__date-badge-month">AGU</span>
                        </div>
                    </div>
                    <div class="event__item-content">
                        <h3 class="event__item-title">Lomba Kemerdekaan Desa</h3>
                        <ul class="event__meta-list">
                            <li>📅 17 Agustus 2026</li>
                            <li>⏰ 08.00 WIB - Selesai</li>
                            <li>📍 Lapangan Desa Jatisari</li>
                        </ul>
                        <p class="event__item-excerpt">Meriahkan Hari Kemerdekaan dengan berbagai perlombaan seru untuk semua warga!</p>
                        <a href="javascript:void(0)" class="btn btn--outline">Lihat Detail</a>
                    </div>
                </div>

                <div class="event__item-card">
                    <div class="event__item-img-wrapper">
                        <img src="{{ asset('images/karnaval.png') }}" alt="Pentas Seni & Budaya">
                        <div class="event__date-badge">
                            <span class="event__date-badge-day">05</span>
                            <span class="event__date-badge-month">SEP</span>
                        </div>
                    </div>
                    <div class="event__item-content">
                        <h3 class="event__item-title">Pentas Seni & Budaya</h3>
                        <ul class="event__meta-list">
                            <li>📅 5 September 2026</li>
                            <li>⏰ 19.00 WIB - Selesai</li>
                            <li>📍 Balai Desa Jatisari</li>
                        </ul>
                        <p class="event__item-excerpt">Malam penuh hiburan dan pelestarian budaya lokal bersama warga desa.</p>
                        <a href="javascript:void(0)" class="btn btn--outline">Lihat Detail</a>
                    </div>
                </div>

                <div class="event__item-card">
                    <div class="event__item-img-wrapper">
                        <img src="{{ asset('images/karnaval.png') }}" alt="Kerja Bakti Lingkungan">
                        <div class="event__date-badge">
                            <span class="event__date-badge-day">20</span>
                            <span class="event__date-badge-month">SEP</span>
                        </div>
                    </div>
                    <div class="event__item-content">
                        <h3 class="event__item-title">Kerja Bakti Lingkungan</h3>
                        <ul class="event__meta-list">
                            <li>📅 20 September 2026</li>
                            <li>⏰ 07.00 WIB - Selesai</li>
                            <li>📍 Seluruh Wilayah Desa</li>
                        </ul>
                        <p class="event__item-excerpt">Ayo bersama-sama menjaga kebersihan dan kelestarian lingkungan desa kita.</p>
                        <a href="javascript:void(0)" class="btn btn--outline">Lihat Detail</a>
                    </div>
                </div>

                <div class="event__item-card">
                    <div class="event__item-img-wrapper">
                        <img src="{{ asset('images/karnaval.png') }}" alt="Pasar Rakyat & UMKM">
                        <div class="event__date-badge">
                            <span class="event__date-badge-day">12</span>
                            <span class="event__date-badge-month">OKT</span>
                        </div>
                    </div>
                    <div class="event__item-content">
                        <h3 class="event__item-title">Pasar Rakyat & UMKM</h3>
                        <ul class="event__meta-list">
                            <li>📅 12 Oktober 2026</li>
                            <li>⏰ 08.00 WIB - Selesai</li>
                            <li>📍 Lapangan Desa Jatisari</li>
                        </ul>
                        <p class="event__item-excerpt">Dukung produk lokal dan nikmati berbagai kuliner khas desa.</p>
                        <a href="javascript:void(0)" class="btn btn--outline">Lihat Detail</a>
                    </div>
                </div>
            </div>
        </div>

        {{-- Section 2: Kalender Event & Event Terdekat --}}
        <div class="event__top">
            <aside class="event__sidebar">
                <div class="event__sidebar-card">
                    <p class="event__sidebar-title">Kalender Event</p>
                    <div class="event__calendar-widget">
                        <div class="event__calendar-header">
                            <button type="button">&lt;</button>
                            <strong>Agustus 2026</strong>
                            <button type="button">&gt;</button>
                        </div>
                        <div class="event__calendar-grid">
                            <span>Min</span><span>Sen</span><span>Sel</span><span>Rab</span><span>Kam</span><span>Jum</span><span>Sab</span>
                            <span></span><span></span><span></span><span></span><span></span><span></span><span>1</span>
                            <span>2</span><span>3</span><span>4</span><span>5</span><span>6</span><span>7</span><span>8</span>
                            <span>9</span><span>10</span><span>11</span><span>12</span><span>13</span><span>14</span><span>15</span>
                            <span>16</span><span class="active">17</span><span>18</span><span>19</span><span>20</span><span>21</span><span>22</span>
                            <span>23</span><span>24</span><span>25</span><span>26</span><span>27</span><span>28</span><span>29</span>
                            <span>30</span><span>31</span>
                        </div>
                    </div>
                </div>
            </aside>

            <div class="event__hero">
                <div class="event__sidebar-card event__nearest-card">
                    <p class="event__sidebar-title">Event Terdekat</p>
                    <div class="event__nearest-body">
                        <img src="{{ asset('images/karnaval.png') }}" alt="Lomba Kemerdekaan Desa" class="event__nearest-img">
                        <div class="event__nearest-info">
                            <span class="event__tag">Event Terdekat</span>
                            <h3 class="event__nearest-title">Lomba Kemerdekaan Desa</h3>
                            <ul class="event__meta-list">
                                <li>📅 17 Agustus 2026</li>
                                <li>⏰ 08.00 WIB - Selesai</li>
                                <li>📍 Lapangan Desa Jatisari</li>
                            </ul>
                            <div class="event__nearest-desc-box">
                                <p>Meriahkan Hari Kemerdekaan dengan berbagai perlombaan seru untuk seluruh warga desa!</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Section 3: Galeri Kegiatan --}}
        <div class="event__gallery-section">
            <div class="event__section-header event__section-header--center">
                <h2 class="event__section-title">Galeri Kegiatan</h2>
                <span class="event__section-divider"></span>
            </div>

            <div class="event__gallery-grid">
                <div class="event__gallery-item">
                    <img src="{{ asset('images/karnaval.png') }}" alt="Kerja Bakti">
                    <p>Kerja Bakti Lingkungan (2025)</p>
                </div>
                <div class="event__gallery-item">
                    <img src="{{ asset('images/karnaval.png') }}" alt="Pentas Seni">
                    <p>Pentas Seni Budaya (2025)</p>
                </div>
                <div class="event__gallery-item">
                    <img src="{{ asset('images/karnaval.png') }}" alt="Pasar Rakyat">
                    <p>Pasar Rakyat & UMKM (2025)</p>
                </div>
                <div class="event__gallery-item">
                    <img src="{{ asset('images/karnaval.png') }}" alt="Lomba Kemerdekaan">
                    <p>Lomba Kemerdekaan (2025)</p>
                </div>
                <div class="event__gallery-item">
                    <img src="{{ asset('images/karnaval.png') }}" alt="Pengajian Desa">
                    <p>Pengajian Desa (2025)</p>
                </div>
            </div>

            <div class="event__gallery-action">
                <a href="javascript:void(0)" class="btn btn--outline">Lihat Semua Galeri</a>
            </div>
        </div>
    </div>
</section>
@endsection