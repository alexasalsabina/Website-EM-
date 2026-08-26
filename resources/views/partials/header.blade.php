<header class="navbar" id="navbar" style="background: linear-gradient(90deg, #08233a 0%, #0b2d49 50%, #08233a 100%) !important; border-radius: 0 0 28px 28px !important; padding: 14px 32px !important; min-height: auto !important; height: auto !important; display: flex !important; align-items: center !important; justify-content: space-between !important; border: 1px solid rgba(255, 255, 255, 0.12) !important; border-top: none !important; position: absolute !important; top: 0 !important; left: 18px !important; width: calc(100% - 36px) !important; box-sizing: border-box !important; margin: 0 !important; box-shadow: 0 8px 24px rgba(2, 16, 30, 0.28) !important;">
    
    <!-- CSS Penyesuaian Ukuran Font & Menaikkan Gambar Bawah -->
    <style>
        /* Reset total container agar gambar slider di bawahnya langsung terangkat ke atas */
        header.navbar, 
        .navbar-container, 
        .navbar-wrapper {
            background-image: none !important;
            box-shadow: none !important;
            border: none !important;
            outline: none !important;
            min-height: 0 !important;
            margin-bottom: 0 !important;
        }

        /* Otomatis menaikkan elemen slider/banner yang persis ada di bawah navbar */
        header.navbar + * {
            margin-top: 0 !important;
            padding-top: 0 !important;
        }

        .navbar, .navbar * {
            box-sizing: border-box !important;
        }

        .navbar__link::after,
        .navbar__link.is-active::after,
        .navbar__dropdown-toggle::after {
            display: none !important;
            content: none !important;
            opacity: 0 !important;
        }

        .navbar__menu {
            transform: translateY(6px) !important;
        }

        /* Ukuran Font Menu Diperbesar 3px (1.15rem) */
        .custom-nav-link {
            position: relative !important;
            text-transform: uppercase !important;
            font-weight: 700 !important;
            font-size: 1.15rem !important; /* Diperbesar dari sebelumnya */
            letter-spacing: 0.5px !important;
            text-decoration: none !important;
            color: rgba(255, 255, 255, 0.9) !important;
            padding: 4px 6px !important;
            line-height: 1.2 !important;
            transition: color 0.2s ease-in-out !important;
            display: flex !important;
            align-items: center !important;
            gap: 6px !important;
            background: transparent !important;
            border: none !important;
            cursor: pointer !important;
            white-space: nowrap !important;
        }

        .custom-nav-link:hover {
            color: #ffffff !important;
        }

        /* Indikator Garis Bawah Aktif */
        .custom-nav-link.is-active {
            color: #ffffff !important;
        }

        .custom-nav-link.is-active::before {
            content: '' !important;
            position: absolute !important;
            bottom: -6px !important;
            left: 0 !important;
            right: 0 !important;
            height: 3px !important;
            background-color: #ffffff !important;
            border-radius: 2px !important;
        }

        /* Dropdown Menu Sub-Item */
        .custom-dropdown-menu {
            display: none;
            position: absolute !important;
            top: 100% !important;
            left: 0 !important;
            min-width: 200px !important;
            background-color: #ffffff !important;
            border: 1px solid rgba(8, 35, 58, 0.12) !important;
            border-radius: 8px !important;
            padding: 8px 0 !important;
            box-shadow: 0 8px 20px rgba(0,0,0,0.5) !important;
            z-index: 1000 !important;
            margin-top: 6px !important;
        }

        .custom-dropdown-menu.show {
            display: block !important;
        }

        .custom-dropdown-item {
            display: block !important;
            padding: 10px 16px !important;
            color: #0b2d49 !important;
            text-decoration: none !important;
            font-size: 0.95rem !important;
            font-weight: 500 !important;
            text-transform: capitalize !important;
            transition: background 0.2s, color 0.2s !important;
            white-space: nowrap !important;
        }

        .custom-dropdown-item:hover,
        .custom-dropdown-item.is-active {
            background-color: #e8f1f7 !important;
            color: #061d31 !important;
        }

        .navbar__caret {
            transition: transform 0.2s ease !important;
        }
        .is-open .navbar__caret {
            transform: rotate(180deg) !important;
        }

        /* Avatar Profil Diperbesar Menyeimbangkan Font Baru */
        .nav-user-avatar {
            width: 36px;
            height: 36px;
            border-radius: 50%;
            background-color: rgba(255, 255, 255, 0.2);
            display: flex;
            align-items: center;
            justify-content: center;
            color: #ffffff;
            text-decoration: none;
            flex-shrink: 0;
            margin-left: 6px;
            transition: background 0.2s;
        }
        .nav-user-avatar:hover {
            background-color: rgba(255, 255, 255, 0.35);
        }
    </style>

    <!-- Logo & Nama Desa (Diperbesar Proporsional) -->
    <a href="{{ url('/') }}" class="navbar__brand" style="display: flex !important; align-items: center !important; gap: 10px !important; text-decoration: none !important; color: #ffffff !important; flex-shrink: 0 !important;">
        <img src="{{ asset('images/logo.png') }}" alt="logo " style="height: 64px; width: auto;">
        <span style="font-weight: 700 !important; font-size: 1.35rem !important; letter-spacing: -0.2px; white-space: nowrap !important; line-height: 1;">Desa Jatisari</span>
    </a>

    <!-- Menu Navigasi Sisi Kanan -->
    <nav class="navbar__menu" id="navbarMenu" style="display: flex !important; align-items: center !important; gap: 16px !important;">
        
        <!-- HOME -->
        <a href="{{ route('home') }}" class="custom-nav-link {{ request()->routeIs('home') ? 'is-active' : '' }}">
           HOME
        </a>

        <a href="{{ route('berita.berita') }}" class="custom-nav-link {{ request()->routeIs('berita.berita') ? 'is-active' : '' }}">
            Berita
        </a>

        <!-- PROFIL -->
        <div class="navbar__item dropdown-container" style="position: relative !important;">
            <button type="button" class="custom-nav-link dropdown-toggle-btn {{ request()->routeIs('profil.*') ? 'is-active' : '' }}">
                PROFIL
                <svg class="navbar__caret" viewBox="0 0 12 8" fill="none" xmlns="http://www.w3.org/2000/svg" style="width: 10px; height: 10px;">
                    <path d="M1 1.5L6 6.5L11 1.5" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </button>

            <div class="custom-dropdown-menu">
                <a href="{{ route('profil.sejarah') }}" class="custom-dropdown-item {{ request()->routeIs('profil.sejarah') ? 'is-active' : '' }}">Sejarah</a>
                <a href="{{ route('profil.visi-misi') }}" class="custom-dropdown-item {{ request()->routeIs('profil.visi-misi') ? 'is-active' : '' }}">Visi & Misi</a>
                <a href="{{ route('profil.kelembagaan') }}" class="custom-dropdown-item {{ request()->routeIs('profil.kelembagaan') ? 'is-active' : '' }}">Kelembagaan</a>
                <a href="{{ route('profil.potensi') }}" class="custom-dropdown-item {{ request()->routeIs('profil.potensi') ? 'is-active' : '' }}">Potensi</a>
                <a href="{{ route('profil.inovasi') }}" class="custom-dropdown-item {{ request()->routeIs('profil.inovasi') ? 'is-active' : '' }}">Inovasi</a>
                <a href="{{ route('profil.prestasi') }}" class="custom-dropdown-item {{ request()->routeIs('profil.prestasi') ? 'is-active' : '' }}">Prestasi</a>
            </div>
        </div>

        <!-- DATA -->
        <div class="navbar__item dropdown-container" style="position: relative !important;">
            <button type="button" class="custom-nav-link dropdown-toggle-btn {{ request()->routeIs('data.*') ? 'is-active' : '' }}">
                DATA
                <svg class="navbar__caret" viewBox="0 0 12 8" fill="none" xmlns="http://www.w3.org/2000/svg" style="width: 10px; height: 10px;">
                    <path d="M1 1.5L6 6.5L11 1.5" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </button>

            <div class="custom-dropdown-menu">
                <a href="{{ route('data.anggaran') }}" class="custom-dropdown-item {{ request()->routeIs('data.anggaran') ? 'is-active' : '' }}">Anggaran</a>
                <a href="{{ route('data.dana-desa') }}" class="custom-dropdown-item {{ request()->routeIs('data.dana-desa') ? 'is-active' : '' }}">Dana Desa</a>
                <a href="{{ route('data.peraturan-desa') }}" class="custom-dropdown-item {{ request()->routeIs('data.peraturan-desa') ? 'is-active' : '' }}">Peraturan Desa</a>
                <a href="{{ route('data.monografi') }}" class="custom-dropdown-item {{ request()->routeIs('data.monografi') ? 'is-active' : '' }}">Monografi</a>
                <a href="{{ route('data.aset-desa') }}" class="custom-dropdown-item {{ request()->routeIs('data.aset-desa') ? 'is-active' : '' }}">Aset Desa</a>
                <a href="{{ route('data.statistik-penduduk') }}" class="custom-dropdown-item {{ request()->routeIs('data.statistik-penduduk') ? 'is-active' : '' }}">Statistik Penduduk</a>
                <a href="{{ route('data.integrasi-data-desa') }}" class="custom-dropdown-item {{ request()->routeIs('data.integrasi-data-desa') ? 'is-active' : '' }}">Integrasi Data Desa</a>
            </div>
        </div>

        <!-- PRODUK HUKUM -->
        <a href="{{ route('produkhukum') }}" class="custom-nav-link {{ request()->routeIs('produkhukum') ? 'is-active' : '' }}">
           PRODUK HUKUM
        </a>

        <!-- PPDI -->
        <a href="{{ route('ppdi') }}" class="custom-nav-link {{ request()->routeIs('ppdi') ? 'is-active' : '' }}">
           PPDI
        </a>

        <!-- GALERI -->
        <a href="{{ route('galeri.index') }}" class="custom-nav-link {{ request()->routeIs('galeri') ? 'is-active' : '' }}">
           GALERI
        </a>

        <!-- EVENT -->
        <a href="{{ route('event.karnaval') }}" class="custom-nav-link {{ request()->routeIs('event.*') ? 'is-active' : '' }}">
           EVENT
        </a>

        <!-- KONTAK -->
        <a href="{{ route('kontak') }}" class="custom-nav-link {{ request()->routeIs('kontak') ? 'is-active' : '' }}">
           KONTAK
        </a>

        <!-- Profile Icon -->
        <a href="{{ route('login') }}" class="nav-user-avatar" aria-label="Masuk ke akun">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor">
                <path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/>
            </svg>
        </a>
    </nav>

    <!-- Toggle Mobile Menu -->
    <button class="navbar__toggle" id="navbarToggle" aria-label="Buka menu" aria-expanded="false">
        <span></span><span></span><span></span>
    </button>
</header>

<!-- JavaScript Interaktif Dropdown -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const dropdownToggles = document.querySelectorAll('.dropdown-toggle-btn');

        dropdownToggles.forEach(toggle => {
            toggle.addEventListener('click', function(e) {
                e.stopPropagation();
                const currentContainer = this.closest('.dropdown-container');
                const currentMenu = currentContainer.querySelector('.custom-dropdown-menu');

                document.querySelectorAll('.custom-dropdown-menu').forEach(menu => {
                    if (menu !== currentMenu) {
                        menu.classList.remove('show');
                        menu.closest('.dropdown-container').classList.remove('is-open');
                    }
                });

                currentMenu.classList.toggle('show');
                currentContainer.classList.toggle('is-open');
            });
        });

        document.addEventListener('click', function() {
            document.querySelectorAll('.custom-dropdown-menu').forEach(menu => {
                menu.classList.remove('show');
                if (menu.closest('.dropdown-container')) {
                    menu.closest('.dropdown-container').classList.remove('is-open');
                }
            });
        });
    });
</script>