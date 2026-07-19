<section class="hero" id="hero">
    <div class="hero__slides">
        <a href="{{ route('event.hut-desa') }}" class="hero__slide is-active" data-index="0">
            <img src="{{ asset('images/hutdesa.png') }}" alt="HUT Desa Jatisari" class="hero__img">
            <div class="hero__overlay"></div>
            <div class="hero__caption">
                <h2 class="hero__title">HUT DESA JATISARI</h2>
                <p class="hero__location">Dusun <strong>Jatisari</strong></p>
            </div>
        </a>

        <a href="{{ route('event.karnaval') }}" class="hero__slide" data-index="1">
            <img src="{{ asset('images/karnaval.png') }}" alt="Karnaval Desa Jatisari" class="hero__img">
            <div class="hero__overlay"></div>
            <div class="hero__caption">
                <h2 class="hero__title">KARNAVAL DESA JATISARI</h2>
                <p class="hero__location">Dusun <strong>Jatisari</strong></p>
            </div>
        </a>
    </div>

    <button class="hero__nav hero__nav--prev" id="heroPrev" aria-label="Slide sebelumnya">
        <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M15 18L9 12L15 6" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
        </svg>
    </button>
    <button class="hero__nav hero__nav--next" id="heroNext" aria-label="Slide berikutnya">
        <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M9 6L15 12L9 18" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
        </svg>
    </button>

    <div class="hero__controls">
        <button class="hero__control-btn" id="heroPlayPause" aria-label="Play/Pause">
            <svg id="iconPause" viewBox="0 0 24 24" fill="currentColor"><rect x="6" y="5" width="4" height="14"/><rect x="14" y="5" width="4" height="14"/></svg>
            <svg id="iconPlay" viewBox="0 0 24 24" fill="currentColor" style="display:none"><path d="M8 5v14l11-7z"/></svg>
        </button>
        <span class="hero__counter"><span id="heroCurrent">1</span>/<span id="heroTotal">2</span></span>
    </div>

    <div class="hero__dots" id="heroDots">
        <button class="hero__dot is-active" data-index="0" aria-label="Slide 1"></button>
        <button class="hero__dot" data-index="1" aria-label="Slide 2"></button>
    </div>
</section>