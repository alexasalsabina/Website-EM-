document.addEventListener('DOMContentLoaded', () => {
    const alert = document.getElementById('successAlert');
    if (!alert) return;
    // Tutup otomatis setelah 5 detik
    setTimeout(() => {
        alert.style.opacity = '0';
        setTimeout(() => {
            alert.remove();
        }, 300);
    }, 5000);
});

// Fungsi tombol close
window.closeAlert = function () {
    const alert = document.getElementById('successAlert');
    if (alert) {
        alert.remove();
    }
};