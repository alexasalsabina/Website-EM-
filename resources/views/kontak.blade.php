@extends('layouts.app')

@section('content')

@vite([
'resources/css/kontak.css',
'resources/js/kontak.js'
])

<section class="contact-hero">

    <div class="hero-overlay"></div>

    <div class="hero-content">
        <h1>Hubungi Kami</h1>
        <p>Kami siap membantu masyarakat Desa Jatisari.</p>
    </div>

</section>


<section class="contact-section">

    <div class="contact-container">

        <!-- Informasi Kontak -->
        <div class="contact-card">

            <h2>Informasi Kontak</h2>

            <div class="contact-item">
                <div class="contact-icon">📍</div>

                <div class="contact-text">
                    <h4>Alamat</h4>
                    <p>
                        Kantor Desa Jatisari <br>
                        Kecamatan ... <br>
                        Kabupaten ...
                    </p>
                </div>
            </div>

            <div class="contact-item">
                <div class="contact-icon">☎</div>

                <div class="contact-text">
                    <h4>Telepon</h4>
                    <p>(0341) xxxx xxxx</p>
                </div>
            </div>

            <div class="contact-item">
                <div class="contact-icon">📱</div>

                <div class="contact-text">
                    <h4>WhatsApp</h4>
                    <p>08xxxxxxxxxx</p>
                </div>
            </div>

            <div class="contact-item">
                <div class="contact-icon">✉</div>

                <div class="contact-text">
                    <h4>Email</h4>
                    <p>desajatisari@email.com</p>
                </div>
            </div>

            <div class="contact-item">
                <div class="contact-icon">🕒</div>

                <div class="contact-text">
                    <h4>Jam Pelayanan</h4>
                    <p>
                        Senin - Jumat <br>
                        08.00 - 15.00 WIB
                    </p>
                </div>
            </div>

        </div>

        <!-- Google Maps -->
        <div class="map-card">

            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15801.28655086638!2d112.65981674432909!3d-8.06863932134642!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd626d8f8d134af%3A0x8a63f2cf14394b03!2sJatisari%2C%20Tajinan%2C%20Malang%20Regency%2C%20East%20Java!5e0!3m2!1sen!2sid!4v1784813696239!5m2!1sen!2sid"
                allowfullscreen
                loading="lazy"
                referrerpolicy="strict-origin-when-cross-origin">
            </iframe>
        </div>

    </div>

</section>

@endsection