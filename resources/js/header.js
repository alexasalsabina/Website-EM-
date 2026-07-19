document.addEventListener('DOMContentLoaded', function () {
    const navbar = document.getElementById('navbar');
    const navbarMenu = document.getElementById('navbarMenu');
    const navbarToggle = document.getElementById('navbarToggle');

    // Toggle menu mobile (hamburger)
    if (navbarToggle && navbarMenu) {
        navbarToggle.addEventListener('click', function () {
            const isOpen = navbarMenu.classList.toggle('is-open');
            navbarToggle.classList.toggle('is-active', isOpen);
            navbarToggle.setAttribute('aria-expanded', isOpen);
        });
    }

    // Toggle dropdown (BERITA, PROFIL, DATA, EVENT)
    const dropdownToggles = document.querySelectorAll('.navbar__dropdown-toggle');

    dropdownToggles.forEach(function (toggle) {
        toggle.addEventListener('click', function (e) {
            e.stopPropagation();
            const parentItem = toggle.closest('.navbar__item--dropdown');
            const isOpen = parentItem.classList.contains('is-open');

            // Tutup dropdown lain yang sedang terbuka
            document.querySelectorAll('.navbar__item--dropdown.is-open').forEach(function (item) {
                if (item !== parentItem) {
                    item.classList.remove('is-open');
                    item.querySelector('.navbar__dropdown-toggle').setAttribute('aria-expanded', false);
                }
            });

            parentItem.classList.toggle('is-open', !isOpen);
            toggle.setAttribute('aria-expanded', !isOpen);
        });
    });

    // Klik di luar navbar akan menutup semua dropdown & menu mobile
    document.addEventListener('click', function (e) {
        if (navbar && !navbar.contains(e.target)) {
            document.querySelectorAll('.navbar__item--dropdown.is-open').forEach(function (item) {
                item.classList.remove('is-open');
                item.querySelector('.navbar__dropdown-toggle').setAttribute('aria-expanded', false);
            });

            if (navbarMenu && navbarMenu.classList.contains('is-open')) {
                navbarMenu.classList.remove('is-open');
                navbarToggle.classList.remove('is-active');
                navbarToggle.setAttribute('aria-expanded', false);
            }
        }
    });

    // Tutup dropdown & menu mobile saat resize ke desktop
    window.addEventListener('resize', function () {
        if (window.innerWidth > 992) {
            document.querySelectorAll('.navbar__item--dropdown.is-open').forEach(function (item) {
                item.classList.remove('is-open');
            });
            if (navbarMenu) navbarMenu.classList.remove('is-open');
            if (navbarToggle) navbarToggle.classList.remove('is-active');
        }
    });
});