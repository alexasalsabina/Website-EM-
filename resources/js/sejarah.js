// Ganti/gabungkan bagian ini ke dalam resources/js/sejarah.js kamu

document.addEventListener('DOMContentLoaded', () => {
    const modal = document.querySelector('[data-tokoh-modal]');

    // ----- FIX UTAMA clipping/"kepotong": pindahkan modal jadi anak langsung
    // dari <body>. Dengan begitu modal tidak lagi terjebak di dalam elemen
    // manapun yang punya overflow:hidden / transform di layout kamu
    // (mis. wrapper <div id="app">, navbar sticky, dsb) — apapun isi
    // layouts.app kamu, modal ini pasti full-screen & tidak ke-clip lagi. -----
    if (modal && modal.parentElement !== document.body) {
        document.body.appendChild(modal);
    }

    const openBtn = document.querySelector('[data-tokoh-open]');
    const closeEls = document.querySelectorAll('[data-tokoh-close]');
    const track = document.querySelector('[data-tokoh-track]');
    const cards = track ? Array.from(track.querySelectorAll('.tokoh-card')) : [];

    let savedScrollY = 0;

    // ----- Buka & tutup modal (scroll-lock anti "nyangkut") -----
    const openModal = () => {
        savedScrollY = window.scrollY || window.pageYOffset;

        document.body.style.position = 'fixed';
        document.body.style.top = `-${savedScrollY}px`;
        document.body.style.left = '0';
        document.body.style.right = '0';
        document.body.style.width = '100%';

        modal.classList.add('is-open');
        modal.setAttribute('aria-hidden', 'false');

        requestAnimationFrame(() => {
            track.scrollLeft = 0;
            updateActiveStates();
        });
    };

    const closeModal = () => {
        modal.classList.remove('is-open');
        modal.setAttribute('aria-hidden', 'true');

        document.body.style.position = '';
        document.body.style.top = '';
        document.body.style.left = '';
        document.body.style.right = '';
        document.body.style.width = '';

        window.scrollTo(0, savedScrollY);
    };

    if (openBtn) openBtn.addEventListener('click', openModal);
    closeEls.forEach((el) => el.addEventListener('click', closeModal));

    document.addEventListener('keydown', (e) => {
        if (e.key === 'Escape' && modal.classList.contains('is-open')) {
            closeModal();
        }
    });

    // ----- Kartu bertahap: tentukan kartu paling tengah, lalu beri
    // class 'step-0' (aktif/besar), 'step-1' (sebelahnya), 'step-2+' (jauh) -----
    function updateActiveStates() {
        if (!track || !cards.length) return;

        const trackRect = track.getBoundingClientRect();
        const centerX = trackRect.left + trackRect.width / 2;

        let activeIndex = 0;
        let closestDist = Infinity;

        cards.forEach((card, i) => {
            const rect = card.getBoundingClientRect();
            const cardCenter = rect.left + rect.width / 2;
            const dist = Math.abs(centerX - cardCenter);
            if (dist < closestDist) {
                closestDist = dist;
                activeIndex = i;
            }
        });

        cards.forEach((card, i) => {
            const diff = Math.abs(i - activeIndex);
            card.classList.remove('step-0', 'step-1', 'step-2', 'is-active');
            card.classList.add(`step-${Math.min(diff, 2)}`);
            if (diff === 0) card.classList.add('is-active');
        });

        return activeIndex;
    }

    if (track) {
        let ticking = false;
        track.addEventListener('scroll', () => {
            if (!ticking) {
                requestAnimationFrame(() => {
                    updateActiveStates();
                    ticking = false;
                });
                ticking = true;
            }
        });

        window.addEventListener('resize', () => requestAnimationFrame(updateActiveStates));

        // ----- Drag to scroll pakai mouse (di HP tinggal swipe jari) -----
        let isDown = false;
        let startX = 0;
        let scrollStart = 0;

        track.addEventListener('mousedown', (e) => {
            isDown = true;
            track.classList.add('is-dragging');
            startX = e.pageX;
            scrollStart = track.scrollLeft;
        });

        window.addEventListener('mouseup', () => {
            isDown = false;
            track.classList.remove('is-dragging');
        });

        window.addEventListener('mousemove', (e) => {
            if (!isDown) return;
            e.preventDefault();
            const delta = e.pageX - startX;
            track.scrollLeft = scrollStart - delta;
        });

        track.addEventListener('wheel', (e) => {
            if (Math.abs(e.deltaY) > Math.abs(e.deltaX)) {
                track.scrollLeft += e.deltaY;
                e.preventDefault();
            }
        }, { passive: false });
    }

    // ----- reveal animation (kalau belum ada di file sejarah.js kamu) -----
    const revealEls = document.querySelectorAll('[data-reveal]');
    if (revealEls.length) {
        const observer = new IntersectionObserver((entries) => {
            entries.forEach((entry) => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('is-visible');
                    observer.unobserve(entry.target);
                }
            });
        }, { threshold: 0.15 });

        revealEls.forEach((el) => observer.observe(el));
    }
});