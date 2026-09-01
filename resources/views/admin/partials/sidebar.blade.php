<aside class="sidebar">

    <div class="sidebar-header">

        <img src="{{ asset('images/logo.png') }}" alt="Logo Desa">

        <h2>Desa Jatisari</h2>

    </div>

    <nav class="sidebar-menu">

        <a href="{{ route('admin.dashboard') }}"
            class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
            <span>🏠</span>
            Dashboard
        </a>

        <a href="{{ route('admin.berita.index') }}"
            class="{{ request()->routeIs('admin.berita.*') ? 'active' : '' }}">
            <span>📰</span>
            Berita
        </a>

        <a href="{{ route('admin.event.index') }}"
            class="{{ request()->routeIs('admin.event.*') ? 'active' : '' }}">
            <span>🎉</span>
            Event
        </a>

        <a href="{{ route('admin.galeri-kategori.index') }}"
            class="{{ request()->routeIs('admin.galeri.*', 'admin.galeri-kategori.*', 'admin.galeri-foto.*') ? 'active' : '' }}">
            <span>🖼️</span>
            Galeri
        </a>

        <a href="{{ route('admin.profil.index') }}"
            class="{{ request()->routeIs('admin.profil.*') ? 'active' : '' }}">
            <span>🏛️</span>
            Profil Desa
        </a>

        <a href="{{ route('admin.data-desa.index') }}"
            class="{{ request()->routeIs('admin.data-desa.*') ? 'active' : '' }}">
            <span>📊</span>
            Data Desa
        </a>

    </nav>

    <div class="sidebar-footer">

        <form action="{{ route('logout') }}" method="POST">
            @csrf

            <button type="submit" class="logout-btn">
                🚪 Logout
            </button>

        </form>

    </div>

</aside>