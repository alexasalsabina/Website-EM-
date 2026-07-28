document.addEventListener("DOMContentLoaded", () => {
    const backToTop = document.getElementById("backToTop");

    if (!backToTop) return;

    // Sembunyikan tombol saat halaman pertama kali dibuka
    backToTop.style.display = "none";

    // Tampilkan tombol saat scroll
    window.addEventListener("scroll", () => {
        if (window.scrollY > 300) {
            backToTop.style.display = "flex";
        } else {
            backToTop.style.display = "none";
        }
    });

    // Scroll ke atas
    backToTop.addEventListener("click", () => {
        window.scrollTo({
            top: 0,
            behavior: "smooth"
        });
    });
});