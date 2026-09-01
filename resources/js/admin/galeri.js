document.addEventListener('DOMContentLoaded', () => {

    // 1. EFEK HOVER KARTU (Mulus & Halus)
    // Menjangkau class .card-galeri, .card-galeri-item, maupun .kategori-card
    const cards = document.querySelectorAll('.card-galeri, .card-galeri-item, .kategori-card');

    cards.forEach(card => {

        // Tambahkan transition via JS agar animasi naik/turun terasa lembut
        card.style.transition = 'transform 0.3s cubic-bezier(0.25, 0.8, 0.25, 1), box-shadow 0.3s ease';

        card.addEventListener('mouseenter', () => {
            card.style.transform = 'translateY(-8px) scale(1.02)';
        });

        card.addEventListener('mouseleave', () => {
            card.style.transform = 'translateY(0) scale(1)';
        });

    });

    // 2. PENANGANAN KLIK FOTO (Bootstrap Modal)
    const modalTriggers = document.querySelectorAll('[data-bs-toggle="modal"]');

    modalTriggers.forEach(trigger => {
        trigger.addEventListener('click', function () {
            const targetModalId = this.getAttribute('data-bs-target');
            const modalElement = document.querySelector(targetModalId);
            
            if (modalElement && typeof bootstrap !== 'undefined') {
                const modalInstance = bootstrap.Modal.getOrCreateInstance(modalElement);
                modalInstance.show();
            }
        });
    });

});