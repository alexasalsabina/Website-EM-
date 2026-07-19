document.addEventListener("DOMContentLoaded", () => {
  const reveals = document.querySelectorAll("#perangkat [data-reveal]");

  reveals.forEach((el, i) => {
    setTimeout(() => el.classList.add("is-visible"), 150 + i * 200);
  });
});