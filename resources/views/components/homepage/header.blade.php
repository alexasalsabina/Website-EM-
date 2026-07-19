<header class="navbar" id="navbar">
    <a href="{{ url('/') }}" class="navbar__brand">
        <img src="{{ asset('images/logo.png') }}" alt="Logo Desa Jatisari" class="navbar__logo">
        <span class="navbar__brand-text">
            <strong>Desa Jatisari</strong>
            <small>kabupaten Malang</small>
        </span>
    </a>

    <nav class="navbar__menu" id="navbarMenu">
        <a href="{{ route('beranda') }}" class="navbar__link {{ request()->routeIs('beranda') ? 'is-active' : '' }}">Beranda</a>

        <div class="navbar__item navbar__item--dropdown">
            <button type="button" class="navbar__link navbar__dropdown-toggle {{ request()->routeIs('profil.*') ? 'is-active' : '' }}" aria-expanded="false">
                Profil
                <svg class="navbar__caret" viewBox="0 0 12 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M1 1.5L6 6.5L11 1.5" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </button>

            <div class="navbar__dropdown">
                <a href="{{ route('profil.desa') }}" class="navbar__dropdown-link {{ request()->routeIs('profil.desa') ? 'is-active' : '' }}">Profil Desa</a>
                <a href="{{ route('profil.visi-misi') }}" class="navbar__dropdown-link {{ request()->routeIs('profil.visi-misi') ? 'is-active' : '' }}">Visi Misi</a>
                <a href="{{ route('profil.rangkup') }}" class="navbar__dropdown-link {{ request()->routeIs('profil.rangkup') ? 'is-active' : '' }}">Rangkup</a>
                <a href="{{ route('profil.perangkat-desa') }}" class="navbar__dropdown-link {{ request()->routeIs('profil.perangkat-desa') ? 'is-active' : '' }}">Perangkat Desa</a>
            </div>
        </div>

        <a href="{{ route('berita') }}" class="navbar__link {{ request()->routeIs('berita') ? 'is-active' : '' }}">Berita</a>
        <a href="{{ route('layanan') }}" class="navbar__link {{ request()->routeIs('layanan') ? 'is-active' : '' }}">Layanan</a>
        <a href="{{ route('residensial') }}" class="navbar__link {{ request()->routeIs('residensial') ? 'is-active' : '' }}">Residensial</a>
        <a href="{{ route('galeri') }}" class="navbar__link {{ request()->routeIs('galeri') ? 'is-active' : '' }}">Galeri</a>
        <a href="{{ route('kontak') }}" class="navbar__link {{ request()->routeIs('kontak') ? 'is-active' : '' }}">Kontak</a>
    </nav>

    <button class="navbar__toggle" id="navbarToggle" aria-label="Buka menu" aria-expanded="false">
        <span></span><span></span><span></span>
    </button>
</header>