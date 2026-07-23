@extends('admin.layouts.app')

@section('content')

<div class="p-8">

    <h1 class="text-3xl font-bold text-green-800">
        Dashboard Admin Desa Jatisari
    </h1>

    <p class="mt-2 text-gray-600">
        Selamat datang, {{ Auth::user()->name }} 👋
    </p>

    <div class="grid grid-cols-3 gap-6 mt-8">

        <div class="bg-white rounded-xl shadow p-6">
            <h3 class="font-semibold text-lg">📰 Berita</h3>
            <p>Kelola berita desa.</p>
        </div>

        <div class="bg-white rounded-xl shadow p-6">
            <h3 class="font-semibold text-lg">📨 Aspirasi</h3>
            <p>Lihat aspirasi warga.</p>
        </div>

        <div class="bg-white rounded-xl shadow p-6">
            <h3 class="font-semibold text-lg">📅 Agenda</h3>
            <p>Kelola agenda desa.</p>
        </div>

        <div class="bg-white rounded-xl shadow p-6">
            <h3 class="font-semibold text-lg">🖼 Galeri</h3>
            <p>Kelola galeri.</p>
        </div>

        <div class="bg-white rounded-xl shadow p-6">
            <h3 class="font-semibold text-lg">🏛 Profil Desa</h3>
            <p>Edit profil desa.</p>
        </div>

        <div class="bg-white rounded-xl shadow p-6">
            <h3 class="font-semibold text-lg">📊 Data Desa</h3>
            <p>Kelola data desa.</p>
        </div>

    </div>

</div>

@endsection