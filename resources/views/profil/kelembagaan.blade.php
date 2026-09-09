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
            @forelse($kelembagaan as $item)
                <article class="kelembagaan__card">
                    <div class="kelembagaan__icon">@if($item->foto)<img src="{{ asset('storage/' . $item->foto) }}" alt="{{ $item->judul }}" loading="lazy">@else<span class="kelembagaan__icon-placeholder">🏢</span>@endif</div>
                    <div class="kelembagaan__meta">
                        <p class="kelembagaan__tag">Kelembagaan Desa</p>
                        <h2 class="kelembagaan__card-title">{{ $item->judul }}</h2>
                        <p class="kelembagaan__card-description">{{ $item->isi }}</p>
                    </div>
                </article>
            @empty
                <p>Belum ada data kelembagaan.</p>
            @endforelse
        </div>
    </div>
</div>
@endsection