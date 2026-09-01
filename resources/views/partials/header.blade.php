<!-- Header Utama -->
<header class="navbar" id="navbar" style="position: fixed !important; top: 0 !important; left: 0 !important; width: 100% !important; z-index: 9999 !important; background: linear-gradient(135deg, #071d32 0%, #0d315e 38%, #0a2344 100%) !important; border-radius: 0 !important; padding: 14px 24px !important; display: flex !important; align-items: center !important; justify-content: space-between !important; border: none !important; border-bottom: 1px solid rgba(255, 255, 255, 0.12) !important; box-sizing: border-box !important; margin: 0 !important; transition: all 0.3s ease-in-out !important; box-shadow: 0 8px 24px rgba(4, 15, 28, 0.35), inset 0 1px 0 rgba(255,255,255,0.08) !important;">
    
    <style>
        /* Efek saat halaman di-scroll ke bawah (Melayang/Sticky Effect) */
        header.navbar.is-scrolled {
            background: rgba(8, 35, 58, 0.95) !important; /* Efek sedikit transparan */
            backdrop-filter: blur(12px) !important;       /* Blur latar belakang */
            -webkit-backdrop-filter: blur(12px) !important;
            padding: 8px 24px !important;                 /* Header sedikit mengecil agar ramping */
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.4) !important;
        }

        /* Container & Alignment Reset */
        header.navbar, .navbar-container, .navbar-wrapper {
            background-image: none !important;
            min-height: 0 !important;
            margin-bottom: 0 !important;
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

        /* Ukuran Font Menu Navigasi */
        .custom-nav-link {
            position: relative !important;
            text-transform: uppercase !important;
            font-weight: 800 !important;
            font-size: 1.18rem !important;
            letter-spacing: 0.7px !important;
            text-decoration: none !important;
            color: rgba(255, 255, 255, 0.94) !important;
            padding: 12px 18px !important;
            line-height: 1.2 !important;
            transition: all 0.25s ease-in-out !important;
            display: flex !important;
            align-items: center !important;
            gap: 8px !important;
            background: transparent !important;
            border: none !important;
            border-radius: 18px !important;
            cursor: pointer !important;
            white-space: nowrap !important;
            box-shadow: none !important;
        }

        .custom-nav-link:hover,
        .custom-nav-link:focus-visible,
        .custom-nav-link.is-active {
            color: #ffffff !important;
            background: rgba(255, 255, 255, 0.08) !important;
            border-color: transparent !important;
            transform: translateY(-1px) !important;
            box-shadow: inset 0 1px 0 rgba(255,255,255,0.08) !important;
        }

        /* Indikator Garis Bawah Aktif */
        .custom-nav-link.is-active::before {
            content: '' !important;
            position: absolute !important;
            bottom: -4px !important;
            left: 18px !important;
            right: 18px !important;
            height: 3px !important;
            background: #ffffff !important;
            border-radius: 999px !important;
        }

        .custom-nav-link.is-active::before {
            content: '' !important;
            position: absolute !important;
            bottom: -5px !important;
            left: 14px !important;
            right: 14px !important;
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

        /* Avatar Profil */
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

        .navbar__toggle {
            display: none;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            gap: 5px;
            width: 42px;
            height: 42px;
            border: 1px solid rgba(255, 255, 255, 0.18);
            border-radius: 10px;
            background: rgba(255, 255, 255, 0.04);
            cursor: pointer;
            flex-shrink: 0;
            padding: 0;
        }

        .navbar__toggle span {
            display: block;
            width: 22px;
            height: 2.5px;
            background: #ffffff;
            border-radius: 999px;
            transition: transform 0.25s ease, opacity 0.25s ease;
        }

        @media (max-width: 980px) {
            header.navbar {
                padding: 10px 16px !important;
            }

            .navbar__brand {
                gap: 8px !important;
            }

            .navbar__brand img {
                height: 40px !important;
            }

            .navbar__brand span {
                font-size: 1.2rem !important;
            }

            .navbar__menu {
                display: none !important;
                position: absolute !important;
                top: calc(100% + 10px) !important;
                left: 12px !important;
                right: 12px !important;
                flex-direction: column !important;
                align-items: stretch !important;
                gap: 8px !important;
                background: rgba(8, 35, 58, 0.98) !important;
                border: 1px solid rgba(255, 255, 255, 0.12) !important;
                border-radius: 16px !important;
                padding: 12px !important;
                box-shadow: 0 12px 28px rgba(0,0,0,0.28) !important;
                z-index: 9998 !important;
            }

            .navbar__menu.is-open {
                display: flex !important;
            }

            .navbar__toggle {
                display: flex !important;
            }

            .navbar__item.dropdown-container {
                width: 100% !important;
            }

            .custom-nav-link {
                width: 100% !important;
                justify-content: space-between !important;
                font-size: 0.95rem !important;
                padding: 12px 14px !important;
                border-radius: 10px !important;
            }

            .custom-dropdown-menu {
                position: static !important;
                min-width: unset !important;
                margin-top: 8px !important;
                background: rgba(255, 255, 255, 0.05) !important;
                border-color: rgba(255, 255, 255, 0.12) !important;
                box-shadow: none !important;
            }

            .custom-dropdown-item {
                color: #ffffff !important;
                padding: 10px 12px !important;
            }

            .custom-dropdown-item:hover,
            .custom-dropdown-item.is-active {
                background-color: rgba(255, 255, 255, 0.08) !important;
                color: #ffffff !important;
            }

            .nav-user-avatar {
                align-self: flex-end;
                margin-left: 0;
            }
        }
    </style>

    <!-- Logo & Nama Desa -->
    <a href="{{ url('/') }}" class="navbar__brand" style="display: flex !important; align-items: center !important; gap: 12px !important; text-decoration: none !important; color: #ffffff !important; flex-shrink: 0 !important;">
        <img src="{{ asset('images/logo.png') }}" alt="logo" style="height: 54px; width: auto; transition: height 0.3s ease; filter: drop-shadow(0 2px 4px rgba(0,0,0,0.2));">
        <span style="font-weight: 900 !important; font-size: 1.9rem !important; letter-spacing: -0.8px; white-space: nowrap !important; line-height: 1; text-shadow: 0 2px 10px rgba(0,0,0,0.18);">Desa Jatisari</span>
    </a>

    <!-- Menu Navigasi -->
    <nav class="navbar__menu" id="navbarMenu" style="display: flex !important; align-items: center !important; gap: 12px !important;">
        
        <a href="{{ route('home') }}" class="custom-nav-link {{ request()->routeIs('home') ? 'is-active' : '' }}">HOME</a>

        <a href="{{ route('berita.berita') }}" class="custom-nav-link {{ request()->routeIs('berita.*') ? 'is-active' : '' }}">BERITA</a>

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
                <a href="{{ route('data.peraturan-desa') }}" class="custom-dropdown-item {{ request()->routeIs('data.peraturan-desa') ? 'is-active' : '' }}">Peraturan Desa</a>
                <a href="{{ route('data.statistik-penduduk') }}" class="custom-dropdown-item {{ request()->routeIs('data.statistik-penduduk') ? 'is-active' : '' }}">Statistik Penduduk</a>
            </div>
        </div>

        <!-- GALERI -->
        <a href="{{ route('galeri.index') }}" class="custom-nav-link {{ request()->routeIs('galeri') ? 'is-active' : '' }}">
            GALERI
        </a>

        <!-- EVENT -->
        <a href="{{ route('event.index') }}" class="custom-nav-link {{ request()->routeIs('event.*') ? 'is-active' : '' }}">
           EVENT
        <a href="#" class="custom-nav-link {{ request()->routeIs('event.*') ? 'is-active' : '' }}">
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

<!-- JavaScript Interaktif -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const navbar = document.getElementById('navbar');
        const navbarToggle = document.getElementById('navbarToggle');
        const navbarMenu = document.getElementById('navbarMenu');

        // Deteksi Scroll untuk Efek Sticky & Blur Header
        window.addEventListener('scroll', function() {
            if (window.scrollY > 20) {
                navbar.classList.add('is-scrolled');
            } else {
                navbar.classList.remove('is-scrolled');
            }
        });

        if (navbarToggle && navbarMenu) {
            navbarToggle.addEventListener('click', function() {
                const isOpen = navbarMenu.classList.toggle('is-open');
                navbarToggle.setAttribute('aria-expanded', String(isOpen));
            });

            navbarMenu.querySelectorAll('a, button').forEach(function(item) {
                item.addEventListener('click', function() {
                    if (window.innerWidth <= 980) {
                        navbarMenu.classList.remove('is-open');
                        navbarToggle.setAttribute('aria-expanded', 'false');
                    }
                });
            });
        }

        // Event listener Dropdown Menu
        const dropdownToggles = document.querySelectorAll('.dropdown-toggle-btn');
        dropdownToggles.forEach(toggle => {
            toggle.addEventListener('click', function(e) {
                e.stopPropagation();
                const currentContainer = this.closest('.dropdown-container');
                const currentMenu = currentContainer.querySelector('.custom-dropdown-menu');

                document.querySelectorAll('.custom-dropdown-menu').forEach(menu => {
                    if (menu !== currentMenu) {
                        menu.classList.remove('show');
                        if (menu.closest('.dropdown-container')) {
                            menu.closest('.dropdown-container').classList.remove('is-open');
                        }
                    }
                });

                currentMenu.classList.toggle('show');
                currentContainer.classList.toggle('is-open');
            });
        });

        document.addEventListener('click', function(event) {
            if (!event.target.closest('.dropdown-container')) {
                document.querySelectorAll('.custom-dropdown-menu').forEach(menu => {
                    menu.classList.remove('show');
                    if (menu.closest('.dropdown-container')) {
                        menu.closest('.dropdown-container').classList.remove('is-open');
                    }
                });
            }
        });
    });
</script>