document.addEventListener("DOMContentLoaded", () => {
  const section = document.querySelector(".statistik, .statistik-penduduk-page");
  const numbers = section?.querySelectorAll("[data-target]");

  if (!section || !numbers?.length) return;

  const showFinalValues = () => {
    numbers.forEach((number) => {
      number.textContent = Number(number.dataset.target).toLocaleString("id-ID");
    });
  };

  if (window.matchMedia("(prefers-reduced-motion: reduce)").matches) {
    showFinalValues();
    return;
  }

  const animate = () => {
    const duration = 5000;
    const start = performance.now();

    const update = (now) => {
      const progress = Math.min((now - start) / duration, 1);
      const easedProgress = 1 - Math.pow(1 - progress, 3);

      numbers.forEach((number) => {
        const target = Number(number.dataset.target);
        number.textContent = Math.round(target * easedProgress).toLocaleString("id-ID");
      });

      if (progress < 1) window.requestAnimationFrame(update);
    };

    window.requestAnimationFrame(update);
  };

  const observer = new IntersectionObserver(
    (entries, currentObserver) => {
      if (entries.some((entry) => entry.isIntersecting)) {
        animate();
        currentObserver.disconnect();
      }
    },
    { threshold: 0.35 }
  );

  observer.observe(section);
});