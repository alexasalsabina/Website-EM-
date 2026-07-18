document.addEventListener("DOMContentLoaded", () => {
  const hero = document.getElementById("profil-hero");
  const bg = hero?.querySelector(".profil-hero__bg");
  const reveals = hero?.querySelectorAll("[data-reveal]") ?? [];
  const searchToggle = document.getElementById("searchToggle");
  const searchForm = document.getElementById("searchForm");
  const prefersReducedMotion = window.matchMedia(
    "(prefers-reduced-motion: reduce)"
  ).matches;

  // 1. Reveal teks hero secara berurutan saat halaman dimuat
  reveals.forEach((el, i) => {
    setTimeout(() => el.classList.add("is-visible"), 150 + i * 150);
  });

  // 2. Parallax halus pada gambar latar saat scroll
  if (!prefersReducedMotion && bg && hero) {
    let ticking = false;

    const updateParallax = () => {
      const scrollY = window.scrollY;
      if (scrollY < hero.offsetHeight) {
        bg.style.transform = `scale(1.06) translateY(${scrollY * 0.3}px)`;
      }
      ticking = false;
    };

    window.addEventListener("scroll", () => {
      if (!ticking) {
        window.requestAnimationFrame(updateParallax);
        ticking = true;
      }
    });
  }

  // 3. Toggle form pencarian
  if (searchToggle && searchForm) {
    searchToggle.addEventListener("click", () => {
      const isOpen = searchForm.classList.toggle("is-open");
      if (isOpen) {
        searchForm.querySelector("input")?.focus();
      }
    });
  }
});