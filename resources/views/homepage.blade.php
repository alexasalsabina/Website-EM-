<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Desa Jatisari - Kabupaten Malang</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500;600;700;800&family=Space+Mono:ital@0;1&display=swap" rel="stylesheet">

    {{-- Ganti asset() dengan @vite karena file ada di resources/, bukan public/ --}}
    @vite(['resources/css/homepage.css', 'resources/js/homepage.js'])
</head>
<body>

    @include('components.homepage.hero')

    <main>
        {{-- Section lain (profil, berita, layanan, dst) taruh di sini --}}
    </main>

    @include('components.homepage.footer')

</body>
</html>