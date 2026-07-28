window.addEventListener('DOMContentLoaded', () => {
  document.querySelectorAll('[data-page-animate]').forEach((el) => {
    requestAnimationFrame(() => el.classList.add('is-visible'));
  });
});
