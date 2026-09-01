@extends('layouts.app')

@section('title', 'Kelembagaan Desa Jatisari')

@push('styles')
    @vite(['resources/css/kelembagaan.css'])
@endpush

@section('content')
<div class="kelembagaan">
    <div class="kelembagaan__inner">
        <x-section-heading
            eyebrow="Profil Desa"
            title="Kelembagaan Desa Jatisari"
            subtitle="Temukan organisasi penting yang bekerja bersama demi kesejahteraan warga desa, dari pemberdayaan komunitas hingga generasi muda yang aktif berkarya."
        />

        <div class="kelembagaan__cards">
            <x-feature-card
                href="{{ url('/profil/kelembagaan/lpm') }}"
                label="Unit Pemberdayaan"
                title="LPMD"
                description="Lembaga yang mendukung inisiatif warga melalui pelatihan, kolaborasi, dan program pembangunan lokal."
            >
                <img src="{{ asset('images/logo lpm.png') }}" alt="Logo LPM" loading="lazy" />
            </x-feature-card>

            <x-feature-card
                href="{{ url('/profil/kelembagaan/pkk') }}"
                label="Kesejahteraan Keluarga"
                title="PKK"
                description="Gerakan perempuan yang membantu peningkatan kesehatan, ekonomi, dan kualitas hidup keluarga desa."
            >
                <img src="{{ asset('images/logo-pkk.png') }}" alt="Logo PKK" loading="lazy" />
            </x-feature-card>

            <x-feature-card
                href="{{ url('/profil/kelembagaan/karang-taruna') }}"
                label="Pemuda dan Sosial"
                title="Karang Taruna"
                description="Forum kepemudaan yang mendorong kreativitas, gotong royong, dan kegiatan positif untuk generasi muda desa."
            >
                <img src="{{ asset('images/logo-sajati.png') }}" alt="Logo Karang Taruna" loading="lazy" />
            </x-feature-card>
        </div>
    </div>
</div>
@endsection