@extends('layouts.app')

@section('title', 'Visi & Misi - Desa Jatisari')

@push('styles')
    @vite(['resources/css/homepage.css', 'resources/css/visimisi.css'])
@endpush

@section('content')
    <section class="visimisi" id="visimisi">
        <div class="visimisi__bg" style="background-image: url('{{ asset('images/jatisari.png') }}');"></div>
        <div class="visimisi__overlay"></div>

        <div class="visimisi__content">

            <div class="visimisi__block" data-reveal>
                <span class="visimisi__badge">visi</span>
                <blockquote class="visimisi__quote">
                    &ldquo;TERWUJUDNYA MASYARAKAT DESA JATISARI YANG
                    AGMANIS, MAJU, SEHAT, BERDAYA SAING, BERAHLAK MULIA
                    DAN BERMARTABAT.&rdquo;
                </blockquote>
            </div>

            <div class="visimisi__block" data-reveal>
                <span class="visimisi__badge">Misi</span>
                <p class="visimisi__list">
                    &ldquo;Misi adalah sesuatu yang harus diemban atau dilaksanakan oleh Pemerintah Desa
                    sesuai dengan Visi yang ditetapkan, agar tujuan Pemerintah Desa dapat terlaksana
                    dan berhasil dengan baik sekaligus merupakan pernyataan yang menetapkan tujuan dan 
                    sasaran Desa yang hendak dicapai, pernyataan Misi membawa Desa kepada suatu tujuan,
                    maka Pemerintah Desa Jatisari menetapkan Pernyataan Misi sebagai berikut:&rdquo;
                </p>

                @php
                    $misi = [
                        'Misi Bidang Keagamaan' => [
                            'Menggiatkan kegiatan-kegiatan keagamaan warga di Dusun, Madrasah, dan sarana lainnya',
                            'Menggambarkan warna prasarana yang menunjang kegiatan keagamaan',
                            'Berkoordinasi dengan para Ulama beserta Dinas terkait untuk peningkatan
                            mutu dan kualitas pendidikan beragama baik yang formal dan non formal',
                        ],
                        'Misi Bidang Pelayanan' => [
                            'Meningkatkan mutu dan kwalitas pelayanan publik dengan sasaran mempermudah masyarakat
                            dalam pengurusan surat menyurat tanpa biaya administrasi, baik itu akte kelahiran, KTP,
                            KK dan lainya, dengan cara melibatkan /mengangkat warga yang berkompeten di bidang tersebut',
                            'Mendatangi warga yang sewaktu-waktu membutuhkan tanda tangan, kerumah-rumah warga yang
                            berhalangan atau sakit dengan cara memasang atau menempel no telfon di setiap titik
                            sebagai sarana untuk mempermudah warga yang sewaktu waktu membutuhkan pelayanan kami',
                            'Mengupayakan alat tansportasi untuk kebutuhan sosial masyarakat desa jatisa',
                        ],
                        'Misi Bidang Hukum' => [
                            'Meningkatkan kesadaran hukum kepada warga dengan cara bekerja sama dengan instansi terkait
                            untuk mendorong dan membimbing masyarakat desa Jatisari dalam menyadari betapa pentingnya
                            faham, sadar dan taat pada Hukum',
                            'Berkoordinasi dengan pihak berwenang dalam menerapkan tindakan hukum kepada siapapun
                            yang melanggar hukum dengan mengedepankan azas kekeluargaan',
                            'Semaksimal mungkin menyelesaikan segala bentuk permasalahanwarga dengan azas musyawarahdan
                            kekeluargaan dengan kedua belah pihak',
                        ],
                        'Misi Bidang Kesehatan' => [
                            'Menumbuhkan rasa peduli dan rasa memiliki terhadap lingkungan masing - masing dengan
                            cara membuang sampah pada tempatnya',
                            'Menyediakan fasilitas bak sampah di wilayah masing - masing guna untuk mempermudah
                            masyarakat membuang sampah',
                            'Membentuk team khusus yang bertugas mengambil sampah kewilayah - wilayah tersebut,
                            yang mana sebelumnya kami berkoordinasi dengan dinas terkait',
                            'Pengadaan mobil siaga bagi desa',
                        ],
                        'Misi Bidang Pemberdayaan' => [
                            'Mengubah kelompok ekonomi konsumtif menjadi kelompok ekonomi produktif',
                            'Meningkatkan partisipasi masyarakat melalui lembaga/organisasi masyarakat yang
                            bergerak di bidang ekonomi, sosial, budaya, dan politik untuk mendorong kemandirian masyarakat',
                            'Membangun dan meningkatkan hasil pertanian dengan jalan penataan pengairan, perbaikan jalan
                            sawah / jalan usaha tani, pemupukan, dan polatanam yang baik',
                            'Membangun dan mendorong usaha-usaha untuk pengembangan dan optimalisasi sektor pertanian,
                            perkebunan, peternakan, dan perikanan, baik tahap produksi maupun tahap pengolahan hasilnya',
                        ],
                        'Misi Bidang Pembangunan' => [
                            'Melanjutkan program desa yang belum terealisasi baik itu fisik atau non fisik',
                            'Membangun kehidupan masyarakat yang lebih baik dan sejahtera',
                            'Meningkatkan kehidupan masyarakat yang semakin layak, adil dan merata serta member perhatian
                            utama pada kebutuhan dasar dan terpenuhinya sarana prasarana umum',
                            'Berusaha semaksimal mungkin agar desa jatisari mempunyai PAD (Pendapatan asli desa)',
                            'Membangun dan mendorong majunya bidang pendidikan baik formal maupun informal yang mudah diakses
                            dan dinikmati seluruh warga masyarakat tanpa terkecuali yang mampu menghasilkan insan intelektual,
                            inovatif dan enterpreneur (wirausahawan)',
                        ],
                    ];
                @endphp

                <ol class="visimisi__list">
    @foreach ($misi as $bidang => $poin)
        <li class="visimisi__item">
            <button type="button" class="visimisi__item-toggle">
                <span>Misi Bidang {{ $bidang }}</span>
                <span class="visimisi__item-icon">+</span>
            </button>
            <div class="visimisi__item-content">
                <ul class="visimisi__sublist">
                    @foreach ($poin as $p)
                        <li>{{ $p }}</li>
                    @endforeach
                </ul>
            </div>
        </li>
    @endforeach
</ol>
            </div>

        </div>
    </section>
@endsection

@push('scripts')
    @vite(['resources/js/homepage.js', 'resources/js/visimisi.js'])
@endpush