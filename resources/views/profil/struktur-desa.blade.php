@extends('layouts.app')

@section('title', 'Struktur Desa Jatisari')

@push('styles')
    @vite(['resources/css/perangkatdesa.css'])
@endpush

@section('content')
<section id="perangkat" class="perangkat">
    <div class="perangkat__bg" style="background-image: url('{{ asset('images/jatisari.png') }}');"></div>
    <div class="perangkat__overlay"></div>

    <div class="perangkat__inner">
        <div class="perangkat__badge" data-reveal>
            <strong>Struktur Desa</strong>
            <span>Pemerintahan Desa Jatisari</span>
        </div>

        <div class="orgchart-scroll" data-reveal>
            <div class="orgchart">
                <ul>
                    <li>
                        <div class="org-person org-person--lead">
                            @php
                                $kepala = $perangkatDesas->firstWhere('jabatan', 'Kepala Desa');
                                $kepala = $kepala ?? $perangkatDesas->first();
                            @endphp

                            @if($kepala)
                                <img src="{{ $kepala->foto ? asset('storage/' . $kepala->foto) : asset('images/default-user.png') }}" alt="{{ $kepala->nama }}" class="org-photo">
                                <div class="org-badge">
                                    <strong>{{ $kepala->nama }}</strong>
                                    <small>{{ $kepala->jabatan }}</small>
                                </div>
                            @else
                                <img src="{{ asset('images/default-user.png') }}" alt="Belum ada data" class="org-photo">
                                <div class="org-badge">
                                    <strong>Belum ada data</strong>
                                    <small>Struktur desa</small>
                                </div>
                            @endif
                        </div>

                        <ul>
                            @php
                                $anak = $perangkatDesas->where('jabatan', '!=', 'Kepala Desa')->reject(fn($item) => in_array($item->jabatan, ['Sekretaris Desa', 'Kepala Urusan', 'Kasi', 'Kepala Dusun']))->values();
                            @endphp

                            @if($anak->isNotEmpty())
                                @foreach($anak as $item)
                                    <li>
                                        <div class="org-person" data-reveal>
                                            <img src="{{ $item->foto ? asset('storage/' . $item->foto) : asset('images/default-user.png') }}" alt="{{ $item->nama }}" class="org-photo">
                                            <div class="org-badge">
                                                <strong>{{ $item->nama }}</strong>
                                                <small>{{ $item->jabatan }}</small>
                                            </div>
                                        </div>
                                    </li>
                                @endforeach
                            @endif
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>
@endsection

@push('scripts')
    @vite(['resources/js/perangkatdesa.js'])
@endpush