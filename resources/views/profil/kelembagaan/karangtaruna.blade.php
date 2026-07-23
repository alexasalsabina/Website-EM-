@extends('layouts.app')

@push('styles')
    @vite('resources/css/karang-taruna.css')
@endpush

@section('content')

<section class="lembaga-section">
    <div class="container">

        <h2 class="section-title">Karang Taruna Desa Jatisari</h2>

        <div class="lembaga-content">

            <!-- Gambar -->
            <div class="lembaga-image">
    <div class="image-placeholder">
        <span>📷</span>
        <p>Tempat Foto Karang Taruna</p>
    </div>
</div>

            <!-- Penjelasan -->
            <div class="lembaga-text">

                <div class="quote">❝</div>

                <p>
                    Karang Taruna merupakan organisasi sosial kemasyarakatan yang menjadi wadah
                    pengembangan generasi muda di Desa Jatisari. Organisasi ini berperan aktif
                    dalam berbagai kegiatan sosial, kepemudaan, olahraga, seni budaya,
                    pemberdayaan masyarakat, hingga kegiatan kemanusiaan demi mewujudkan
                    pemuda yang kreatif, mandiri, dan berdaya saing.
                </p>

                <h3>Karang Taruna Jatisari</h3>
                <span>LEMBAGA KEPEMUDAAN DESA</span>

                <a href="#" class="btn-profile">
                    Lihat Selengkapnya
                </a>

            </div>

        </div>

    </div>
</section>

@endsection