document.addEventListener("DOMContentLoaded", () => {
  const reveals = document.querySelectorAll("#lembaga [data-reveal]");

  reveals.forEach((el, i) => {
    setTimeout(() => el.classList.add("is-visible"), 150 + i * 120);
  });
});