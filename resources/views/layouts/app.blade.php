<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title', 'Desa Jatisari')</title>

    {{-- CSS & JS Global --}}
    @vite([
        'resources/css/app.css',
        'resources/js/app.js'
    ])

    {{-- CSS tambahan per halaman --}}
    @stack('styles')
</head>
<body>
    <div id="globalLoader" class="global-loader">
        <div class="global-loader__inner">
            <div class="global-loader__ring"></div>
            <p class="global-loader__text">Memuat halaman...</p>
        </div>
    </div>

    <div id="appContent" class="app-content">
        @include('partials.header')

        <main>
            @yield('content')
        </main>

        @include('partials.footer')
    </div>

    {{-- JS tambahan per halaman --}}
    @stack('scripts')
</body>
</html>