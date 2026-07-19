document.addEventListener('DOMContentLoaded', function () {
    const slides = document.querySelectorAll('.hero__slide');
    const dots = document.querySelectorAll('.hero__dot');
    const prevBtn = document.getElementById('heroPrev');
    const nextBtn = document.getElementById('heroNext');
    const playPauseBtn = document.getElementById('heroPlayPause');
    const iconPlay = document.getElementById('iconPlay');
    const iconPause = document.getElementById('iconPause');
    const currentEl = document.getElementById('heroCurrent');

    if (!slides.length) return;

    let current = 0;
    let isPlaying = true;
    let timer = null;
    const total = slides.length;
    const intervalMs = 3000;

    function goTo(index) {
        slides[current].classList.remove('is-active');
        dots[current].classList.remove('is-active');

        current = (index + total) % total;

        slides[current].classList.add('is-active');
        dots[current].classList.add('is-active');
        currentEl.textContent = current + 1;
    }

    function next() { goTo(current + 1); }
    function prev() { goTo(current - 1); }

    function startAutoplay() {
        timer = setInterval(next, intervalMs);
    }

    function stopAutoplay() {
        clearInterval(timer);
    }

    nextBtn.addEventListener('click', () => { next(); stopAutoplay(); startAutoplay(); });
    prevBtn.addEventListener('click', () => { prev(); stopAutoplay(); startAutoplay(); });

    dots.forEach(dot => {
        dot.addEventListener('click', () => {
            goTo(parseInt(dot.dataset.index));
            stopAutoplay();
            startAutoplay();
        });
    });

    playPauseBtn.addEventListener('click', () => {
        isPlaying = !isPlaying;
        if (isPlaying) {
            iconPlay.style.display = 'none';
            iconPause.style.display = 'block';
            startAutoplay();
        } else {
            iconPlay.style.display = 'block';
            iconPause.style.display = 'none';
            stopAutoplay();
        }
    });

    startAutoplay();
});