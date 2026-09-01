@extends('layouts.app')

@section('title', 'Tokoh Desa')

@push('styles')
    @vite([
        'resources/css/sejarah.css',
    ])
@endpush

@section('content')
    <section class="sejarah" id="tokoh">
        <div class="sejarah__bg" style="background-image: url('{{ asset('images/sejarah-bg.jpg') }}');"></div>
        <div class="sejarah__overlay"></div>

        <div class="sejarah__inner">
            <div class="sejarah__heading">
                <h1 class="sejarah__title" data-reveal>Tokoh Desa Jatisari</h1>
                <p class="sejarah__subtitle" data-reveal>Daftar tokoh yang berperan penting dalam sejarah desa.</p>
            </div>

            <div class="sejarah__card" data-reveal>
                <div class="sejarah__story">
                    <ul class="sejarah__story-list">
                        <li data-reveal>KH. Abdul Wahab (Buyut Timah)</li>
                        <li data-reveal>Buyut Sareh</li>
                        <li data-reveal>Buyut Marwie</li>
                        <li data-reveal>Buyut Jum'ah</li>
                        <li data-reveal>Buyut Landou</li>
                        <li data-reveal>Mbah Sambisari</li>
                        <li data-reveal>Mbah Jagopati (Syeh Mahmudi bin Yusuf)</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
    @vite(['resources/js/sejarah.js'])
@endpush
