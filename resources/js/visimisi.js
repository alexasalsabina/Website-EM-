document.addEventListener("DOMContentLoaded", () => {
  const reveals = document.querySelectorAll("#visimisi [data-reveal]");
  const prefersReducedMotion = window.matchMedia(
    "(prefers-reduced-motion: reduce)"
  ).matches;

  if (!reveals.length) return;

  if (prefersReducedMotion) {
    reveals.forEach((el) => el.classList.add("is-visible"));
    return;
  }

  const observer = new IntersectionObserver(
    (entries) => {
      entries.forEach((entry, i) => {
        if (entry.isIntersecting) {
          setTimeout(() => {
            entry.target.classList.add("is-visible");
          }, i * 80);
          observer.unobserve(entry.target);
        }
      });
    },
    { threshold: 0.2, rootMargin: "0px 0px -10% 0px" }
  );

  reveals.forEach((el) => observer.observe(el));
});

document.addEventListener('DOMContentLoaded', () => {
    const toggles = document.querySelectorAll('.visimisi__item-toggle');

    toggles.forEach((btn) => {
        btn.addEventListener('click', () => {
            const item = btn.closest('.visimisi__item');
            const isOpen = item.classList.contains('is-open');

            // opsional: tutup item lain saat satu dibuka (accordion style)
            document.querySelectorAll('.visimisi__item.is-open').forEach((el) => {
                if (el !== item) el.classList.remove('is-open');
            });

            item.classList.toggle('is-open', !isOpen);
        });
    });
});