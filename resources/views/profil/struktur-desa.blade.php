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
                        {{-- TINGKAT 1: KEPALA DESA --}}
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
                                $sekretaris = $perangkatDesas->firstWhere('jabatan', 'Sekretaris Desa');

                                // Semua perangkat selain Kepala Desa & Sekretaris Desa
                                $stafLain = $perangkatDesas
                                    ->whereNotIn('jabatan', ['Kepala Desa', 'Sekretaris Desa'])
                                    ->reject(function ($item) use ($kepala, $sekretaris) {
                                        return ($kepala && $item->id === $kepala->id)
                                            || ($sekretaris && $item->id === $sekretaris->id);
                                    })
                                    ->unique(function ($item) {
                                        return strtolower(trim($item->nama));
                                    })
                                    ->values();
                            @endphp

                            @if($sekretaris)
                                {{-- TINGKAT 2: SEKRETARIS DESA --}}
                                <li>
                                    <div class="org-person" data-reveal>
                                        <img src="{{ $sekretaris->foto ? asset('storage/' . $sekretaris->foto) : asset('images/default-user.png') }}" alt="{{ $sekretaris->nama }}" class="org-photo">
                                        <div class="org-badge">
                                            <strong>{{ $sekretaris->nama }}</strong>
                                            <small>{{ $sekretaris->jabatan }}</small>
                                        </div>
                                    </div>

                                    {{-- TINGKAT 3: KAUR / KASI / KADUS / STAF LAINNYA --}}
                                    @if($stafLain->isNotEmpty())
                                        <ul>
                                            @foreach($stafLain as $item)
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
                                        </ul>
                                    @endif
                                </li>
                            @else
                                {{-- Belum ada Sekretaris Desa: staf lain jadi anak langsung Kepala Desa --}}
                                @foreach($stafLain as $item)
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