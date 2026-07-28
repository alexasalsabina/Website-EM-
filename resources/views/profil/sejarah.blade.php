@extends('layouts.app')

@section('title', 'Sejarah Desa')

@push('styles')
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500;600;700;800&display=swap" rel="stylesheet">

    @vite([
        'resources/css/sejarah.css',
    ])
@endpush

@section('content')
    <section class="sejarah" id="sejarah">
        <div class="sejarah__bg" style="background-image: url('{{ asset('images/sejarah-bg.jpg') }}');"></div>
        <div class="sejarah__overlay"></div>

        <div class="sejarah__inner">
            <div class="sejarah__heading">
                <h1 class="sejarah__title" data-reveal>Sejarah Desa</h1>
                <p class="sejarah__subtitle" data-reveal>Sejarah Asal Usul Desa Jatisari - Tajinan</p>
            </div>

            <div class="sejarah__card sejarah__card--story" data-reveal>
                <div class="sejarah__card-header">
                    <div class="sejarah__asset">
                        <img src="{{ asset('images/hutdesa.png') }}" alt="Ilustrasi Desa Jatisari" />
                    </div>
                    <div class="sejarah__quote-panel">
                        <p>“Berdasarkan cerita rakyat, kampung ini masih berupa hutan belantara penuh pohon jati.”</p>
                        <p>“Desa Jatisari dinamakan demikian karena mengambil nama dari Hutan Jati, alas jati yang tergundul.”</p>
                    </div>
                </div>
                <div class="sejarah__story">
                    <p class="sejarah__story-line" data-reveal>Berdasarkan cerita rakyat, pada masa/zaman kerajaan Belanda yang dipimpin seorang Ratu bernama Yuliana, anak Wihelmina dari Belanda, kampung ini masih berupa hutan belantara penuh pohon jati.</p>
                    <p class="sejarah__story-line" data-reveal>Kemudian datang beberapa orang dari Pati Jawa Tengah: KH. Abdul Wahab (Buyut Timah), Buyut Sareh, dan Buyut Marwie. Mereka membabat alas bersama sampai berkembang menjadi sebuah perkampungan.</p>
                    <p class="sejarah__story-line" data-reveal>Setelah hutan habis dibabat dan situasi berubah menjadi kampung, datang lagi Buyut Jum'ah, Mbah Landou, Mbah Sambisari, dan yang terakhir Syeh Mahmudi bin Yusuf yang lebih dikenal sebagai Mbah Jagopati dari Serang Banten.</p>
                    <p class="sejarah__story-line" data-reveal>Desa Jatisari dinamakan demikian karena mengambil nama dari Hutan Jati (alas jati) yang pada masa itu ditebang habis hingga tinggal 'sarinya'.</p>
                    <p class="sejarah__story-line" data-reveal>Dusun Krajan menjadi pusat pemerintahan desa dan kumpulan beberapa kampung seperti Kampung Tengah, Kampung Jaten, dan Kampung Santren.</p>
                    <p class="sejarah__story-line" data-reveal>Dusun Mulyojati merupakan kumpulan kampung seperti Kampung Japanan, Kampung Telon, Kampung Etan Kali, dan Kampung Kandangan.</p>
                    <p class="sejarah__story-line" data-reveal>Untuk mengenal lebih jauh pelaku babat alas desa ini, berikut adalah tokoh‑tokoh yang berperan besar dalam sejarah Desa Jatisari:</p>
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