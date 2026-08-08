document.addEventListener('DOMContentLoaded', () => {

    const cards = document.querySelectorAll('.kategori-card');

    cards.forEach(card => {

        card.addEventListener('mouseenter', () => {
            card.style.transform = 'translateY(-8px) scale(1.02)';
        });

        card.addEventListener('mouseleave', () => {
            card.style.transform = '';
        });

    });

});