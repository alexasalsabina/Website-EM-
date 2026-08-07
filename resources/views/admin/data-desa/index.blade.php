@extends('admin.layouts.app')

@section('title', 'Data Desa')
@section('page-title', 'Data Desa')

@push('styles')
    @vite('resources/css/admin/datadesa.css')
@endpush

@push('scripts')
    @vite('resources/js/admin/datadesa.js')
@endpush

@section('content')

<div class="datadesa-wrapper">

    {{-- Header --}}
    <div class="datadesa-header">
        <h1>Kelola Data Desa</h1>
        <p>
            Kelola seluruh informasi data Desa Jatisari yang akan ditampilkan pada website.
        </p>
    </div>

    {{-- Grid --}}
    <div class="datadesa-grid">

        {{-- Anggaran --}}
        <div class="datadesa-card">

            <div class="datadesa-icon">💰</div>

            <h3>Anggaran</h3>

            <p>
                Kelola dokumen APBDes, laporan anggaran, dan informasi keuangan desa.
            </p>

            <a href="{{ route('admin.data-desa.anggaran') }}">
                Kelola
            </a>

        </div>

        {{-- Dana Desa --}}
        <div class="datadesa-card">

            <div class="datadesa-icon">🏦</div>

            <h3>Dana Desa</h3>

            <p>
                Kelola informasi dana desa yang diterima beserta dokumen pendukungnya.
            </p>

            <a href="{{ route('admin.data-desa.dana') }}">
                Kelola
            </a>

        </div>

        {{-- Peraturan Desa --}}
        <div class="datadesa-card">

            <div class="datadesa-icon">📜</div>

            <h3>Peraturan Desa</h3>

            <p>
                Kelola seluruh Peraturan Desa (Perdes) yang berlaku.
            </p>

            <a href="{{ route('admin.data-desa.peraturan') }}">
                Kelola
            </a>

        </div>

        {{-- Monografi --}}
        <div class="datadesa-card">

            <div class="datadesa-icon">📊</div>

            <h3>Monografi</h3>

            <p>
                Kelola data umum desa seperti luas wilayah, dusun, RT/RW, dan informasi lainnya.
            </p>

            <a href="{{ route('admin.data-desa.monografi') }}">
                Kelola
            </a>

        </div>

        {{-- Aset Desa --}}
        <div class="datadesa-card">

            <div class="datadesa-icon">🏢</div>

            <h3>Aset Desa</h3>

            <p>
                Kelola daftar aset yang dimiliki Desa Jatisari beserta kondisinya.
            </p>

            <a href="{{ route('admin.data-desa.aset') }}">
                Kelola
            </a>

        </div>

        {{-- Statistik Penduduk --}}
        <div class="datadesa-card">

            <div class="datadesa-icon">👥</div>

            <h3>Statistik Penduduk</h3>

            <p>
                Kelola data statistik penduduk yang akan ditampilkan dalam bentuk grafik dan informasi.
            </p>

            <a href="{{ route('admin.data-desa.statistik') }}">
                Kelola
            </a>

        </div>

        {{-- Integrasi Data --}}
        <div class="datadesa-card">

            <div class="datadesa-icon">🔗</div>

            <h3>Integrasi Data</h3>

            <p>
                Kelola tautan menuju sistem dan layanan pemerintah yang terintegrasi.
            </p>

            <a href="{{ route('admin.data-desa.integrasi') }}">
                Kelola
            </a>

        </div>

    </div>

</div>

@endsection