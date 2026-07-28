<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Dashboard Admin')</title>
    @vite([
        'resources/css/app.css',
        'resources/css/admin.css'
    ])
</head>

<body>
    <div class="admin-wrapper">
        {{-- Sidebar --}}
        <aside class="sidebar">
            <div class="sidebar-header">
                <img src="{{ asset('images/logo.png') }}" alt="Logo Desa">
                <h2>Desa Jatisari</h2>
                <span>Administrator</span>
            </div>

            <nav class="sidebar-menu">
                <a href="{{ route('admin.dashboard') }}">
                    🏠
                    <span>Dashboard</span>
                </a>

                <a href="{{ route('admin.berita.index') }}">
                    📰
                    <span>Berita</span>
                </a>

                <a href="{{ route('admin.aspirasi.index') }}">
                    📨
                    <span>Aspirasi Warga</span>
                </a>

                <a href="{{ route('admin.agenda.index') }}">
                    📅
                    <span>Agenda</span>
                </a>

                <a href="{{ route('admin.galeri.index') }}">
                    🖼
                    <span>Galeri</span>
                </a>

                <a href="{{ route('admin.profil.index') }}">
                    🏛
                    <span>Profil Desa</span>
                </a>

                <a href="{{ route('admin.data-desa.index') }}">
                    📊
                    <span>Data Desa</span>
                </a>
            </nav>

            <div class="sidebar-footer">
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit">
                        🚪 Logout
                    </button>
                </form>
            </div>
        </aside>

        {{-- Content --}}
        <main class="content">
            @yield('content')
        </main>
    </div>
</body>
</html>