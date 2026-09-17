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
<body class="min-h-screen flex flex-col bg-[#0b1d33]"> {{-- Menggunakan flex column & set tinggi min 100vh --}}
    <div id="globalLoader" class="global-loader">
        <div class="global-loader__inner">
            <div class="global-loader__ring"></div>
            <p class="global-loader__text">Memuat halaman...</p>
        </div>
    </div>

    {{-- Tambahkan flex-1 dan flex flex-col pada appContent --}}
    <div id="appContent" class="app-content flex-1 flex flex-col">
        @include('partials.header')

        {{-- main menggunakan flex-1 agar mengambil sisa ruang dan mendorong footer ke bawah --}}
        <main class="flex-1">
            @yield('content')
        </main>

        @include('partials.footer')
    </div>

    {{-- JS tambahan per halaman --}}
    @stack('scripts')
</body>
</html>