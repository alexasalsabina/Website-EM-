@extends('admin.layouts.app')

@section('title', 'Profil Desa')
@section('page-title', 'Profil Desa')

@push('styles')
    @vite('resources/css/admin/profil.css')
@endpush

@push('scripts')
    @vite('resources/js/admin/profil.js')
@endpush

@section('content')

<div class="profil-wrapper">

    <div class="profil-header">
        <h1>Kelola Profil Desa</h1>
        <p>
            Kelola seluruh informasi profil Desa Jatisari.
        </p>
    </div>

    <div class="profil-grid">

        {{-- Sambutan --}}
        <div class="profil-card">
            <div class="profil-icon">👤</div>

            <h3>Sambutan</h3>

            <p>
                Kelola sambutan Kepala Desa.
            </p>

            <a href="{{ route('admin.profil.sambutan.edit') }}" aria-label="Kelola sambutan Kepala Desa">
                Kelola
            </a>
        </div>

        {{-- Struktur --}}
        <div class="profil-card">

            <div class="profil-icon">🏛</div>

            <h3>Struktur</h3>

            <p>
                Kelola struktur pemerintahan.
            </p>

            <a href="{{ route('admin.profil.struktur.index') }}" aria-label="Kelola struktur pemerintahan">
                Kelola
            </a>

        </div>

        {{-- Potensi --}}
        <div class="profil-card">

            <div class="profil-icon">🌾</div>

            <h3>Potensi</h3>

            <p>
                Kelola potensi desa.
            </p>

            <a href="{{ route('admin.profil.potensi') }}" aria-label="Kelola potensi desa">
                Kelola
            </a>

        </div>

        {{-- Inovasi --}}
        <div class="profil-card">

            <div class="profil-icon">💡</div>

            <h3>Inovasi</h3>

            <p>
                Kelola inovasi desa.
            </p>

            <a href="{{ route('admin.profil.inovasi.index') }}" aria-label="Kelola inovasi desa">
                Kelola
            </a>

        </div>

        {{-- Prestasi --}}
        <div class="profil-card">

            <div class="profil-icon">🏆</div>

            <h3>Prestasi</h3>

            <p>
                Kelola prestasi desa.
            </p>

            <a href="{{ route('admin.profil.prestasi.index') }}" aria-label="Kelola prestasi desa">
                Kelola
            </a>

        </div>

    </div>

</div>

@endsection