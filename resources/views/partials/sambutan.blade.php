<section class="sambutan">
    <div class="sambutan__container">
        <h2 class="sambutan__heading">Pemerintah Desa Jatisari</h2>

        @php
            $sambutan = \App\Models\Sambutan::first();
            $namaKepalaDesa = $sambutan->nama_kepala_desa ?? 'Bapak M. Baihaqi';
            $isiSambutan = $sambutan->isi_sambutan ?? 'Selamat datang di Website resmi Pemerintah Desa Jatisari. Ini adalah ruang media informasi desa sebagai sarana komunikasi dan keterbukaan informasi publik. Jangan lupa selalu ikuti website dan media sosial kami untuk update informasi dalam penyelenggaraan pemerintahan di Desa Jatisari. Terima kasih sudah mengunjungi website kami. Semoga bermanfaat, kritik dan saran selalu kami harapkan untuk desa yang lebih baik.';
            $fotoKepalaDesa = $sambutan && $sambutan->foto ? Storage::url($sambutan->foto) : asset('images/kepala desa.png');
        @endphp

        <div class="sambutan__content">
            <div class="sambutan__photo">
                <img src="{{ $fotoKepalaDesa }}" alt="{{ $namaKepalaDesa }}" class="sambutan__img">
            </div>

            <div class="sambutan__text">
                <span class="sambutan__quote-icon">&#8221;</span>

                <p class="sambutan__paragraph">
                    {{ $isiSambutan }}
                </p>

                <p class="sambutan__signature">{{ $namaKepalaDesa }}</p>
                <p class="sambutan__role">KEPALA DESA JATISARI</p>

                <a href="{{ route('profil.sejarah') }}" class="sambutan__btn">Profile</a>
            </div>
        </div>
    </div>
</section>