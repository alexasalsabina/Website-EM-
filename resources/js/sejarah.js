document.addEventListener("DOMContentLoaded", () => {
  const reveals = Array.from(document.querySelectorAll("#sejarah [data-reveal]"));
  const prefersReducedMotion = window.matchMedia("(prefers-reduced-motion: reduce)").matches;

  if (!reveals.length) return;

  const revealObserver = new IntersectionObserver(
    (entries, observerInstance) => {
      entries.forEach((entry) => {
        if (!entry.isIntersecting) return;

        const element = entry.target;
        const delay = element.dataset.delay ? Number(element.dataset.delay) : 0;
        element.style.transitionDelay = `${delay}s`;
        element.classList.add("is-visible");
        observerInstance.unobserve(element);
      });
    },
    { threshold: 0.2, rootMargin: "0px 0px -10% 0px" }
  );

  reveals.forEach((el, index) => {
    el.dataset.delay = (index * 0.08).toFixed(2);
    revealObserver.observe(el);
  });

  if (prefersReducedMotion) {
    reveals.forEach((el) => el.classList.add("is-visible"));
  }
});
