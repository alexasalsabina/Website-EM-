document.addEventListener("DOMContentLoaded", () => {
  const hero = document.getElementById("hero");
  const bg = hero?.querySelector(".hero__bg");
  const reveals = document.querySelectorAll("[data-reveal]");
  const navbarToggle = document.getElementById("navbarToggle");
  const navbarMenu = document.getElementById("navbarMenu");
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

  // 3. Toggle menu mobile (hamburger)
  if (navbarToggle && navbarMenu) {
    navbarToggle.addEventListener("click", () => {
      const isOpen = navbarMenu.classList.toggle("is-open");
      navbarToggle.setAttribute("aria-expanded", String(isOpen));
    });

    // Tutup menu setelah klik salah satu link (khusus tampilan mobile)
    navbarMenu.querySelectorAll(".navbar__link").forEach((link) => {
      link.addEventListener("click", () => {
        navbarMenu.classList.remove("is-open");
        navbarToggle.setAttribute("aria-expanded", "false");
      });
    });
  }

  // 4. Toggle dropdown menu "Profil"
  document.querySelectorAll(".navbar__item--dropdown").forEach((item) => {
    const toggle = item.querySelector(".navbar__dropdown-toggle");

    toggle?.addEventListener("click", (e) => {
      e.stopPropagation();
      const isOpen = item.classList.toggle("is-open");
      toggle.setAttribute("aria-expanded", String(isOpen));

      // Tutup dropdown lain yang mungkin masih terbuka
      document.querySelectorAll(".navbar__item--dropdown").forEach((other) => {
        if (other !== item) {
          other.classList.remove("is-open");
          other.querySelector(".navbar__dropdown-toggle")?.setAttribute("aria-expanded", "false");
        }
      });
    });
  });

  // Tutup dropdown saat klik di luar area navbar
  document.addEventListener("click", (e) => {
    if (!e.target.closest(".navbar__item--dropdown")) {
      document.querySelectorAll(".navbar__item--dropdown.is-open").forEach((item) => {
        item.classList.remove("is-open");
        item.querySelector(".navbar__dropdown-toggle")?.setAttribute("aria-expanded", "false");
      });
    }
  });

  // 5. Toggle form pencarian
  if (searchToggle && searchForm) {
    searchToggle.addEventListener("click", () => {
      const isOpen = searchForm.classList.toggle("is-open");
      if (isOpen) {
        searchForm.querySelector("input")?.focus();
      }
    });
  }

  // 5. Smooth scroll untuk anchor internal yang masih ada di halaman yang sama
  //    (contoh: tombol "Pencarian" atau anchor lain selain menu navbar)
  document.querySelectorAll('a[href^="#"]').forEach((link) => {
    link.addEventListener("click", (e) => {
      const targetId = link.getAttribute("href");
      const target = document.querySelector(targetId);
      if (target) {
        e.preventDefault();
        target.scrollIntoView({ behavior: "smooth", block: "start" });
      }
    });
  });
});