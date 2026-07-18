<section class="hero" id="hero">
    <div class="hero__bg" style="background-image: url('{{ asset('images/jatisari.png') }}');"></div>
    <div class="hero__overlay"></div>

    @include('components.homepage.header')

    <div class="hero__content">
        <p class="hero__lead" data-reveal>Selamat Datang di</p>
        <h1 class="hero__title" data-reveal>SAJATI</h1>
        <p class="hero__desc" data-reveal>
            Sistem Informasi Desa Jatisari Terpadu dan Informatif.
        </p>

        <button class="hero__search" id="searchToggle" data-reveal>
            <svg class="hero__search-icon" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <circle cx="11" cy="11" r="7" stroke="currentColor" stroke-width="2"/>
                <path d="M20 20L16.5 16.5" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
            </svg>
            <span>Pencarian</span>
        </button>

        <form class="hero__search-form" id="searchForm" action="{{ url('/search') }}" method="GET">
            <input type="text" name="q" placeholder="Cari informasi desa..." class="hero__search-input" autocomplete="off">
        </form>
    </div>
</section>