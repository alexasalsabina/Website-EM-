<header class="navbar" id="navbar">
    <a href="{{ url('/') }}" class="navbar__brand">
        <img src="{{ asset('images/logo.png') }}" alt="Logo Desa Jatisari" class="navbar__logo">
        <span class="navbar__brand-text">
            <strong>Desa Jatisari</strong>
        </span>
    </a>

    <nav class="navbar__menu" id="navbarMenu">
        <a href="{{ route('home') }}" class="navbar__link {{ request()->routeIs('home') ? 'is-active' : '' }}">HOME</a>

        <div class="navbar__item navbar__item--dropdown">
            <button type="button" class="navbar__link navbar__dropdown-toggle {{ request()->routeIs('berita.*') ? 'is-active' : '' }}" aria-expanded="false">
                BERITA
                <svg class="navbar__caret" viewBox="0 0 12 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M1 1.5L6 6.5L11 1.5" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </button>

            <div class="navbar__dropdown">
                <a href="{{ route('berita.berita') }}" class="navbar__dropdown-link {{ request()->routeIs('berita.berita') ? 'is-active' : '' }}">BERITA</a>
                <a href="{{ route('berita.artikel') }}" class="navbar__dropdown-link {{ request()->routeIs('berita.artikel') ? 'is-active' : '' }}">ARTIKEL</a>
                <a href="{{ route('berita.opini') }}" class="navbar__dropdown-link {{ request()->routeIs('berita.opini') ? 'is-active' : '' }}">OPINI</a>
                <a href="{{ route('berita.agenda') }}" class="navbar__dropdown-link {{ request()->routeIs('berita.agenda') ? 'is-active' : '' }}">AGENDA</a>
            </div>
        </div>

        <div class="navbar__item navbar__item--dropdown">
            <button type="button" class="navbar__link navbar__dropdown-toggle {{ request()->routeIs('profil.*') ? 'is-active' : '' }}" aria-expanded="false">
                PROFIL
                <svg class="navbar__caret" viewBox="0 0 12 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M1 1.5L6 6.5L11 1.5" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </button>

            <div class="navbar__dropdown">
                <a href="{{ route('profil.sejarah') }}" class="navbar__dropdown-link {{ request()->routeIs('profil.sejarah') ? 'is-active' : '' }}">SEJARAH</a>
                <a href="{{ route('profil.visi-misi') }}" class="navbar__dropdown-link {{ request()->routeIs('profil.visi-misi') ? 'is-active' : '' }}">VISI & MISI</a>
                <a href="{{ route('profil.kelembagaan') }}" class="navbar__dropdown-link {{ request()->routeIs('profil.kelembagaan') ? 'is-active' : '' }}">KELEMBAGAAN</a>
                <a href="{{ route('profil.monografi') }}" class="navbar__dropdown-link {{ request()->routeIs('profil.monografi') ? 'is-active' : '' }}">MONOGRAFI</a>
                <a href="{{ route('profil.potensi') }}" class="navbar__dropdown-link {{ request()->routeIs('profil.potensi') ? 'is-active' : '' }}">POTENSI</a>
                <a href="{{ route('profil.inovasi') }}" class="navbar__dropdown-link {{ request()->routeIs('profil.inovasi') ? 'is-active' : '' }}">INOVASI</a>
                <a href="{{ route('profil.prestasi') }}" class="navbar__dropdown-link {{ request()->routeIs('profil.prestasi') ? 'is-active' : '' }}">PRESTASI</a>
            </div>
        </div>

        <div class="navbar__item navbar__item--dropdown">
            <button type="button" class="navbar__link navbar__dropdown-toggle {{ request()->routeIs('data.*') ? 'is-active' : '' }}" aria-expanded="false">
                DATA
                <svg class="navbar__caret" viewBox="0 0 12 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M1 1.5L6 6.5L11 1.5" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </button>

            <div class="navbar__dropdown">
                <a href="{{ route('data.anggaran') }}" class="navbar__dropdown-link {{ request()->routeIs('data.anggaran') ? 'is-active' : '' }}">ANGGARAN</a>
                <a href="{{ route('data.dana-desa') }}" class="navbar__dropdown-link {{ request()->routeIs('data.dana-desa') ? 'is-active' : '' }}">DANA DESA</a>
                <a href="{{ route('data.peraturan-desa') }}" class="navbar__dropdown-link {{ request()->routeIs('data.peraturan-desa') ? 'is-active' : '' }}">PERATURAN DESA</a>
                <a href="{{ route('data.monografi') }}" class="navbar__dropdown-link {{ request()->routeIs('data.monografi') ? 'is-active' : '' }}">MONOGRAFI</a>
                <a href="{{ route('data.aset-desa') }}" class="navbar__dropdown-link {{ request()->routeIs('data.aset-desa') ? 'is-active' : '' }}">ASET DESA</a>
                <a href="{{ route('data.statistik-penduduk') }}" class="navbar__dropdown-link {{ request()->routeIs('data.statistik-penduduk') ? 'is-active' : '' }}">STATISTIK PENDUDUK</a>
                <a href="{{ route('data.integrasi-data-desa') }}" class="navbar__dropdown-link {{ request()->routeIs('data.integrasi-data-desa') ? 'is-active' : '' }}">INTEGRASI DATA DESA</a>
            </div>
        </div>

        <a href="{{ route('produkhukum') }}" class="navbar__link {{ request()->routeIs('produkhukum') ? 'is-active' : '' }}">PRODUK HUKUM</a>
        <a href="{{ route('ppdi') }}" class="navbar__link {{ request()->routeIs('ppdi') ? 'is-active' : '' }}">PPDI</a>
        <a href="{{ route('galeri') }}" class="navbar__link {{ request()->routeIs('galeri') ? 'is-active' : '' }}">GALERI</a>

        <div class="navbar__item navbar__item--dropdown">
            <button type="button" class="navbar__link navbar__dropdown-toggle {{ request()->routeIs('event.*') ? 'is-active' : '' }}" aria-expanded="false">
                EVENT
                <svg class="navbar__caret" viewBox="0 0 12 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M1 1.5L6 6.5L11 1.5" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </button>

            <div class="navbar__dropdown">
                <a href="{{ route('event.karnaval-kemerdekaan') }}" class="navbar__dropdown-link {{ request()->routeIs('event.karnaval-kemerdekaan') ? 'is-active' : '' }}">KARNAVAL KEMERDEKAAN</a>
                <a href="{{ route('event.karnaval') }}" class="navbar__dropdown-link {{ request()->routeIs('event.karnaval') ? 'is-active' : '' }}">KARNAVAL</a>
                <a href="{{ route('event.hut-desa') }}" class="navbar__dropdown-link {{ request()->routeIs('event.hut-desa') ? 'is-active' : '' }}">HUT DESA</a>
            </div>
        </div>

        <a href="{{ route('kontak') }}" class="navbar__link {{ request()->routeIs('kontak') ? 'is-active' : '' }}">KONTAK</a>
    </nav>

    <button class="navbar__toggle" id="navbarToggle" aria-label="Buka menu" aria-expanded="false">
        <span></span><span></span><span></span>
    </button>

    <div class="navbar__profile">
        @auth
            <div class="navbar__item navbar__item--dropdown" id="profileDropdown">
                <button type="button" class="navbar__profile-btn" aria-expanded="false">
                    <svg viewBox="0 0 24 24" fill="currentColor" width="24" height="24">
                        <path d="M12 12c2.7 0 5-2.3 5-5s-2.3-5-5-5-5 2.3-5 5 2.3 5 5 5zm0 2c-3.3 0-10 1.7-10 5v3h20v-3c0-3.3-6.7-5-10-5z"/>
                    </svg>
                </button>
                <div class="navbar__dropdown navbar__dropdown--profile">
                    <a href="{{ route('dashboard') }}" class="navbar__dropdown-link">Dashboard</a>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="navbar__dropdown-link navbar__dropdown-link--btn">Logout</button>
                    </form>
                </div>
            </div>
        @else
            <a href="{{ route('login') }}" class="navbar__profile-btn">
                <svg viewBox="0 0 24 24" fill="currentColor" width="24" height="24">
                    <path d="M12 12c2.7 0 5-2.3 5-5s-2.3-5-5-5-5 2.3-5 5 2.3 5 5 5zm0 2c-3.3 0-10 1.7-10 5v3h20v-3c0-3.3-6.7-5-10-5z"/>
                </svg>
            </a>
        @endauth
    </div>
</header>