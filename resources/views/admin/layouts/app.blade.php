<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title', 'Dashboard Admin')</title>

    @vite([
        'resources/css/app.css',
        'resources/css/admin.css',
        'resources/js/app.js',
        'resources/js/admin.js'
    ])

    @stack('styles')
</head>

<body>

<div class="admin-wrapper">

    {{-- Sidebar --}}
    @include('admin.partials.sidebar')

    {{-- Overlay untuk menutup sidebar di mobile --}}
    <div class="sidebar-overlay"></div>

    {{-- Content --}}
    <div class="content-wrapper">

        {{-- Navbar --}}
        @include('admin.partials.navbar')

        {{-- Flash Message --}}
        @include('admin.partials.alert')

        {{-- Isi Halaman --}}
        <main class="page-content">

            @yield('content')

        </main>


        {{-- Footer --}}
        @include('admin.partials.footer')

    </div>

</div>

@stack('scripts')

</body>
</html>