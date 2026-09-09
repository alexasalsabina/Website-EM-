@extends('layouts.app')

@section('title', 'Potensi Desa Jatisari')

@push('styles')
    @vite(['resources/css/potensi.css'])
    <style>
        /* Penyesuaian khusus tampilan di dalam kartu agar gambar di samping penjelasan */
        .potensi__card {
            display: flex;
            flex-direction: row;
            align-items: center;
            gap: 24px;
            padding: 20px;
            border-radius: 20px;
            background-color: #1e293b;
            border: 1px solid rgba(255, 255, 255, 0.08);
            margin-bottom: 20px;
            transition: transform 0.3s ease;
        }

        .potensi__card:hover {
            transform: translateY(-4px);
        }

        .potensi__card-image {
            flex: 0 0 40%;
            max-width: 40%;
            height: 220px;
            border-radius: 16px;
            overflow: hidden;
            background-color: #0f172a;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .potensi__card-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .potensi__card-content {
            flex: 1;
            display: flex;
            flex-direction: column;
            align-items: flex-start;
        }

        .potensi__card-label {
            display: inline-block;
            background: rgba(255, 255, 255, 0.12);
            color: #94a3b8;
            font-size: 0.8rem;
            font-weight: 700;
            padding: 6px 16px;
            border-radius: 50px;
            text-transform: uppercase;
            margin-bottom: 12px;
        }

        .potensi__card-title {
            color: #ffffff;
            font-size: 1.6rem;
            font-weight: 700;
            margin: 0 0 10px 0;
        }

        .potensi__card-text {
            color: #cbd5e1;
            font-size: 0.95rem;
            line-height: 1.6;
            margin: 0;
        }

        @media (max-width: 768px) {
            .potensi__card {
                flex-direction: column;
            }
            .potensi__card-image {
                max-width: 100%;
                width: 100%;
                height: 200px;
            }
        }
    </style>
@endpush

@section('content')
<section class="potensi">
    <div class="potensi__inner">
        <x-section-heading
            eyebrow="Potensi Desa"
            title="Potensi Unggulan Desa Jatisari"
            subtitle="Desa Jatisari memiliki kekayaan alam dan budaya yang kuat: pertanian produktif, wisata alam, potensi energi terbarukan, serta komunitas yang bersinergi untuk pemberdayaan masyarakat."
        />

        <div class="potensi__highlight">
            @forelse($potensi as $item)
                <a href="{{ route('potensi.detail', $item->slug) }}" class="potensi__card-link">
                    <article class="potensi__card">
                        <!-- Gambar di sebelah kiri -->
                        <div class="potensi__card-image">
                            @if($item->foto)
                                <img src="{{ asset('storage/' . $item->foto) }}" alt="{{ $item->judul }}">
                            @else
                                <span>🌾</span>
                            @endif
                        </div>
                        
                        <!-- Penjelasan di sebelah kanan gambar -->
                        <div class="potensi__card-content">
                            <span class="potensi__card-label">
                                {{ isset($item->created_at) ? \Carbon\Carbon::parse($item->created_at)->format('d F Y') : 'Potensi Desa' }}
                            </span>
                            <h3 class="potensi__card-title">{{ $item->judul }}</h3>
                            <p class="potensi__card-text">{{ $item->isi }}</p>
                        </div>
                    </article>
                </a>
            @empty
                <p>Belum ada potensi desa yang tersedia.</p>
            @endforelse
        </div>

        <div class="potensi__details">
            <div class="potensi__details-card" data-page-animate>
                <h3 class="potensi__details-title">Sumber Daya Alam</h3>
                <p class="potensi__details-text">Desa Jatisari berada di wilayah yang kaya dengan tanah subur serta potensi sumber daya air. Kondisi ini mendukung irigasi, pertanian berkelanjutan, dan pengembangan kebun sayur lokal.</p>
                <ul class="potensi__list">
                    <li class="potensi__list-item">Pengembangan tanaman pangan keluarga</li>
                    <li class="potensi__list-item">Rintisan hortikultura dan budidaya</li>
                    <li class="potensi__list-item">Potensi agroeduwisata dan pertanian modern</li>
                </ul>
            </div>
            <div class="potensi__details-card" data-page-animate>
                <h3 class="potensi__details-title">Sumber Daya Manusia</h3>
                <p class="potensi__details-text">Masyarakat aktif dan jaringan kelembagaan yang baik memperkuat inisiatif desa, mulai dari pelatihan UMKM hingga kegiatan pemuda dalam Karang Taruna.</p>
                <ul class="potensi__list">
                    <li class="potensi__list-item">Kolaborasi antar lembaga desa</li>
                    <li class="potensi__list-item">Pengembangan keterampilan dan kewirausahaan</li>
                    <li class="potensi__list-item">Potensi digitalisasi usaha desa</li>
                </ul>
            </div>
        </div>

        <div class="potensi__footer" data-page-animate>
            <h3 class="potensi__footer-title">Visi Pengembangan Potensi</h3>
            <p class="potensi__footer-text">Memperkuat potensi lokal Desa Jatisari melalui sinergi antara alam, budaya, dan komunitas, sehingga tercipta ekonomi desa yang mandiri, ramah lingkungan, dan berkelanjutan.</p>
        </div>
    </div>
</section>
@endsection