@extends('layouts.app')

@section('title', 'Galeri Desa Jatisari')

@push('styles')
    @vite(['resources/css/galeri.css'])
@endpush

@section('content')
<section class="gallery-page">
    {{-- Hero Banner Full Width --}}
    <div class="gallery-hero" style="background-image: url('{{ asset('images/karnaval.png') }}');">
        <div class="gallery-hero__content">
            <h1 class="gallery-hero__title">Galeri Desa</h1>
            <p class="gallery-hero__subtitle">Dokumentasi momen, kegiatan, dan keindahan Desa Jatisari yang diabadikan dalam album foto.</p>
        </div>
    </div>

    <div class="gallery-page__inner">
        {{-- Section: Album / Folder Galeri --}}
        <div class="gallery-section">
            <div class="gallery-section__header">
                <h2 class="gallery-section__title">Album Dokumentasi</h2>
                <span class="gallery-section__divider"></span>
                <p class="gallery-section__subtitle">Pilih album di bawah untuk melihat kumpulan foto kegiatan</p>
            </div>

            {{-- Grid Folder Album --}}
            <div class="gallery-folders">

                {{-- Album 1: HUT Kemerdekaan --}}
                <div class="folder-card" onclick="openGalleryModal('album-kemerdekaan')">
                    <div class="folder-card__cover-wrapper">
                        <img src="{{ asset('images/lapangan.jpeg') }}" alt="HUT Kemerdekaan" class="folder-card__cover">
                        <div class="folder-card__badge">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                            <span>3 Foto</span>
                        </div>
                    </div>
                    <div class="folder-card__info">
                        <h3 class="folder-card__title">HUT Kemerdekaan RI</h3>
                        <p class="folder-card__desc">Dokumentasi perlombaan, jalan sehat, dan upacara peringatan kemerdekaan.</p>
                        <div class="folder-card__actions">
                            <span class="folder-card__action">Buka Album &rarr;</span>
<<<<<<< HEAD
                            <a href="{{ route('event.index') }}" class="btn btn--primary btn--sm" onclick="event.stopPropagation()">Lihat Berita</a>
=======
                            <a href="{{ route('event.index') }}" class="btn btn--primary btn--sm" onclick="event.stopPropagation()">Lihat Berita</a>                            <a href="{{ Route::has('event.karnaval') ? route('event.karnaval') : '#' }}" class="btn btn--primary btn--sm" onclick="event.stopPropagation()">Lihat Berita</a>
>>>>>>> 9187e30ca5d32e25153e8d7d4978ad72fb7f1811
>>>>>>> 8501bbc862649a5a826c7c20551d67c7b181f35f
                        </div>
                    </div>
                </div>

                {{-- Album 2: Pentas Seni & Budaya --}}
                <div class="folder-card" onclick="openGalleryModal('album-pentas-seni')">
                    <div class="folder-card__cover-wrapper">
                        <img src="{{ asset('images/lapangan.jpeg') }}" alt="Pentas Seni" class="folder-card__cover">
                        <div class="folder-card__badge">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                            <span>2 Foto</span>
                        </div>
                    </div>
                    <div class="folder-card__info">
                        <h3 class="folder-card__title">Pentas Seni & Budaya</h3>
                        <p class="folder-card__desc">Penampilan pertunjukan tarian tradisional dan musik warga desa.</p>
                        <div class="folder-card__actions">
                            <span class="folder-card__action">Buka Album &rarr;</span>
                            <a href="{{ route('event.index') }}" class="btn btn--primary btn--sm" onclick="event.stopPropagation()">Lihat Berita</a>
<<<<<<< HEAD
=======
                            <a href="{{ Route::has('event.karnaval') ? route('event.karnaval') : '#' }}" class="btn btn--primary btn--sm" onclick="event.stopPropagation()">Lihat Berita</a>
>>>>>>> 8501bbc862649a5a826c7c20551d67c7b181f35f
                        </div>
                    </div>
                </div>

                {{-- Album 3: Kerja Bakti --}}
                <div class="folder-card" onclick="openGalleryModal('album-kerja-bakti')">
                    <div class="folder-card__cover-wrapper">
                        <img src="{{ asset('images/karnaval.png') }}" alt="Kerja Bakti" class="folder-card__cover">
                        <div class="folder-card__badge">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                            <span>1 Foto</span>
                        </div>
                    </div>
                    <div class="folder-card__info">
                        <h3 class="folder-card__title">Gotong Royong & Kerja Bakti</h3>
                        <p class="folder-card__desc">Aksi kebersihan rutin lingkungan RT/RW Desa Jatisari.</p>
                        <div class="folder-card__actions">
                            <span class="folder-card__action">Buka Album &rarr;</span>
                            <a href="{{ route('event.index') }}" class="btn btn--primary btn--sm" onclick="event.stopPropagation()">Lihat Berita</a>
<<<<<<< HEAD
=======
                            <a href="{{ Route::has('event.karnaval') ? route('event.karnaval') : '#' }}" class="btn btn--primary btn--sm" onclick="event.stopPropagation()">Lihat Berita</a>
>>>>>>> 8501bbc862649a5a826c7c20551d67c7b181f35f
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>

{{-- Lightbox Modal Popup --}}
<div id="galleryModal" class="gallery-modal" aria-hidden="true">
    <div class="gallery-modal__overlay" onclick="closeGalleryModal()"></div>

    <div class="gallery-modal__content">
        <button type="button" class="gallery-modal__close" onclick="closeGalleryModal()" aria-label="Tutup Galeri">&times;</button>

        <div class="gallery-modal__viewer">
            <button type="button" class="gallery-modal__nav gallery-modal__nav--prev" onclick="changeSlide(-1)" aria-label="Sebelumnya">
                <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                    <polyline points="15 18 9 12 15 6"></polyline>
                </svg>
            </button>

            <div class="gallery-modal__img-wrapper">
                <img id="modalImage" src="" alt="Foto Galeri">
            </div>

            <button type="button" class="gallery-modal__nav gallery-modal__nav--next" onclick="changeSlide(1)" aria-label="Berikutnya">
                <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                    <polyline points="9 18 15 12 9 6"></polyline>
                </svg>
            </button>
        </div>

        <div class="gallery-modal__footer">
            <div class="gallery-modal__details">
                <span id="modalCounter" class="gallery-modal__counter">Foto 1 dari 3</span>
                <h3 id="modalTitle" class="gallery-modal__title">HUT KEMERDEKAAN</h3>
                <p id="modalCaption" class="gallery-modal__caption">Suasana keseruan lomba antardesa.</p>
            </div>
            <a id="modalNewsBtn" href="#" class="btn btn--primary">Lihat Berita</a>
        </div>
    </div>
</div>

@push('scripts')
<script>
    const galleryData = {
        'album-kemerdekaan': [
            {
                src: "{{ asset('images/lapangan.jpeg') }}",
                title: "HUT KEMERDEKAAN RI - KARNAVAL DESA",
                caption: "Kemeriahan pawai dan karnaval warga dalam memperingati HUT Kemerdekaan RI.",
                newsUrl: "{{ route('event.index') }}"
<<<<<<< HEAD
=======
                newsUrl: "{{ Route::has('event.karnaval') ? route('event.karnaval') : '#' }}"
>>>>>>> 8501bbc862649a5a826c7c20551d67c7b181f35f
            },
            {
                src: "{{ asset('images/karnaval.png') }}",
                title: "LOMBA RAKYAT ANTAR RT",
                caption: "Keseruan lomba balap karung dan makan kerupuk anak-anak desa.",
                newsUrl: "{{ route('event.index') }}"
<<<<<<< HEAD
=======
=======
                newsUrl: "{{ Route::has('event.karnaval') ? route('event.karnaval') : '#' }}"
>>>>>>> 8501bbc862649a5a826c7c20551d67c7b181f35f
            },
            {
                src: "{{ asset('images/karnaval.png') }}",
                title: "MALAM PUNCAK HUT RI",
                caption: "Penyerahan hadiah lomba dan panggung hiburan masyarakat.",
                newsUrl: "{{ route('event.index') }}"
<<<<<<< HEAD
=======
                newsUrl: "{{ Route::has('event.karnaval') ? route('event.karnaval') : '#' }}"
>>>>>>> 8501bbc862649a5a826c7c20551d67c7b181f35f
            }
        ],
        'album-pentas-seni': [
            {
                src: "{{ asset('images/karnaval.png') }}",
                title: "PENTAS SENI - TARI TRADISIONAL",
                caption: "Pertunjukan seni tari daerah oleh pemuda-pemudi Desa Jatisari.",
                newsUrl: "{{ route('event.index') }}"
<<<<<<< HEAD
=======
                newsUrl: "{{ Route::has('event.karnaval') ? route('event.karnaval') : '#' }}"
>>>>>>> 8501bbc862649a5a826c7c20551d67c7b181f35f
            },
            {
                src: "{{ asset('images/karnaval.png') }}",
                title: "PERTUNJUKAN MUSIK BAMBU",
                caption: "Alunan musik tradisional kreasi seni warga desa.",
                newsUrl: "{{ route('event.index') }}"
<<<<<<< HEAD
=======
                newsUrl: "{{ Route::has('event.karnaval') ? route('event.karnaval') : '#' }}"
>>>>>>> 8501bbc862649a5a826c7c20551d67c7b181f35f
            }
        ],
        'album-kerja-bakti': [
            {
                src: "{{ asset('images/karnaval.png') }}",
                title: "GOTONG ROYONG LINGKUNGAN",
                caption: "Kegiatan kerja bakti serentak membersihkan fasilitas umum desa.",
                newsUrl: "{{ route('event.index') }}"
<<<<<<< HEAD
=======
                newsUrl: "{{ Route::has('event.karnaval') ? route('event.karnaval') : '#' }}"
>>>>>>> 8501bbc862649a5a826c7c20551d67c7b181f35f
            }
        ]
    };

    let currentAlbum = [];
    let currentIndex = 0;

    function openGalleryModal(albumKey) {
        if (!galleryData[albumKey] || galleryData[albumKey].length === 0) return;

        currentAlbum = galleryData[albumKey];
        currentIndex = 0;

        updateModalContent();

        const modal = document.getElementById('galleryModal');
        if (modal) {
            modal.classList.add('is-open');
            document.body.style.overflow = 'hidden';
        }
    }

    function closeGalleryModal() {
        const modal = document.getElementById('galleryModal');
        if (modal) {
            modal.classList.remove('is-open');
            document.body.style.overflow = '';
        }
    }

    function changeSlide(direction) {
        if (!currentAlbum.length) return;
        
        currentIndex += direction;
        
        if (currentIndex < 0) {
            currentIndex = currentAlbum.length - 1;
        } else if (currentIndex >= currentAlbum.length) {
            currentIndex = 0;
        }

        updateModalContent();
    }

    function updateModalContent() {
        const item = currentAlbum[currentIndex];
        if (!item) return;

        const imgEl = document.getElementById('modalImage');
        const titleEl = document.getElementById('modalTitle');
        const captionEl = document.getElementById('modalCaption');
        const newsBtnEl = document.getElementById('modalNewsBtn');
        const counterEl = document.getElementById('modalCounter');
        
        if (imgEl) imgEl.src = item.src;
        if (titleEl) titleEl.textContent = item.title;
        if (captionEl) captionEl.textContent = item.caption;
        if (newsBtnEl) newsBtnEl.href = item.newsUrl;
        if (counterEl) counterEl.textContent = `Foto ${currentIndex + 1} dari ${currentAlbum.length}`;
    }

    document.addEventListener('keydown', function(e) {
        const modal = document.getElementById('galleryModal');
        if (!modal || !modal.classList.contains('is-open')) return;

        if (e.key === 'Escape') closeGalleryModal();
        if (e.key === 'ArrowLeft') changeSlide(-1);
        if (e.key === 'ArrowRight') changeSlide(1);
    });
</script>
@endpush
@endsection