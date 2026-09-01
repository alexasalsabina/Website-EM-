/* ==========================================================
   Script untuk interaksi card Agenda / Berita
   Simpan file ini di: public/js/berita.js
   ========================================================== */

document.addEventListener('DOMContentLoaded', function () {

    // Contoh: log slug ketika tombol "selengkapnya" diklik
    const agendaButtons = document.querySelectorAll('.agenda-btn');

    agendaButtons.forEach(function (btn) {
        btn.addEventListener('click', function (e) {
            const slug = this.dataset.slug;
            console.log('Membuka detail agenda dengan slug:', slug);

            // Contoh: kalau mau load detail via AJAX, uncomment ini
            // e.preventDefault();
            // fetch(`/berita/${slug}`)
            //     .then(res => res.json())
            //     .then(data => {
            //         console.log(data);
            //     })
            //     .catch(err => console.error('Gagal memuat detail:', err));
        });
    });

});