document.addEventListener("DOMContentLoaded", () => {

    const cards = document.querySelectorAll(".datadesa-card");

    cards.forEach(card => {

        card.addEventListener("mouseenter", () => {
            card.style.transform = "translateY(-8px)";
        });

        card.addEventListener("mouseleave", () => {
            card.style.transform = "translateY(0)";
        });

    });

});