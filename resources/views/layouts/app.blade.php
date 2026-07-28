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

    @include('partials.header')

    <main>
        @yield('content')
    </main>

    @include('partials.footer')

    {{-- JS tambahan per halaman --}}
    @stack('scripts')

</body>
</html>