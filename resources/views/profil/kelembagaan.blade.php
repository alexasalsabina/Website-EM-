@extends('layouts.app')

@section('title', 'Kelembagaan Desa Jatisari')

@section('content')
<!-- Import Bootstrap & FontAwesome untuk Ikon Sementara -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

<style>
    .kelembagaan-section {
        font-family: 'Plus Jakarta Sans', sans-serif;
        background: linear-gradient(rgba(15, 23, 42, 0.55), rgba(15, 23, 42, 0.55)), 
                    url('/images/bg-kelembagaan.jpg') center/cover no-repeat fixed;
        min-height: 85vh;
        padding-top: 80px;
        padding-bottom: 100px;
        display: flex;
        align-items: center;
    }

    /* Container Utama Grid Kartu */
    .card-lembaga-link {
        text-decoration: none;
        color: inherit;
        display: block;
        height: 100%;
    }

    .card-lembaga {
        background: #ffffff;
        border-radius: 14px;
        padding: 40px 24px 35px 24px;
        text-align: center;
        box-shadow: 0 12px 30px rgba(0, 0, 0, 0.25);
        transition: all 0.3s ease;
        height: 100%;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: flex-start;
        border: none;
    }

    /* Efek Hover */
    .card-lembaga-link:hover .card-lembaga {
        transform: translateY(-10px);
        box-shadow: 0 18px 40px rgba(0, 0, 0, 0.35);
    }

    /* Ukuran Wadah Logo */
    .logo-wrapper {
        width: 120px;
        height: 120px;
        margin-bottom: 20px;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .logo-wrapper img {
        max-width: 100%;
        max-height: 100%;
        object-fit: contain;
    }

    /* Style Ikon Sementara jika Logo Belum Ada */
    .icon-placeholder {
        width: 75px;
        height: 75px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 32px;
    }

    .bg-pkk { background-color: #e3f2fd; color: #0d6efd; }
    .bg-kt { background-color: #f8d7da; color: #dc3545; }

    /* Judul Utama Lembaga */
    .title-lembaga {
        font-size: 1.35rem;
        font-weight: 800;
        color: #2b2b2b;
        letter-spacing: 0.5px;
        margin-bottom: 8px;
        text-transform: uppercase;
    }

    /* Sub-judul Penjelasan Lembaga */
    .subtitle-lembaga {
        font-size: 0.92rem;
        color: #666666;
        font-weight: 500;
        line-height: 1.4;
        margin: 0;
    }
</style>

<div class="kelembagaan-section">
    <div class="container">
        <div class="row g-4 justify-content-center">
            
            <!-- 1. LPMD (Menggunakan file "logo lpm" milikmu) -->
            <div class="col-lg-4 col-md-6">
                <a href="{{ url('/profil/kelembagaan/lpm') }}" class="card-lembaga-link">
                    <div class="card-lembaga">
                        <div class="logo-wrapper">
                            <!-- Memanggil file gambar "logo lpm.png" -->
                            <img src="{{ asset('images/logo lpm.png') }}" 
                                 alt="Logo LPM" 
                                 onerror="this.onerror=null; this.src='{{ asset('images/logo lpm.jpg') }}';">
                        </div>
                        <div class="title-lembaga">LPMD</div>
                        <p class="subtitle-lembaga">Lembaga Pemberdayaan Masyarakat Desa</p>
                    </div>
                </a>
            </div>

            <!-- 2. PKK (Ikon Sementara) -->
            <div class="col-lg-4 col-md-6">
                <a href="{{ url('/profil/kelembagaan/pkk') }}" class="card-lembaga-link">
                    <div class="card-lembaga">
                        <div class="logo-wrapper">
                            <div class="icon-placeholder bg-pkk">
                                <i class="fa-solid fa-hands-holding-child"></i>
                            </div>
                        </div>
                        <div class="title-lembaga">PKK</div>
                        <p class="subtitle-lembaga">Pemberdayaan Kesejahteraan Keluarga</p>
                    </div>
                </a>
            </div>

            <!-- 3. KARANG TARUNA (Ikon Sementara) -->
            <div class="col-lg-4 col-md-6">
                <a href="{{ url('/profil/kelembagaan/karang-taruna') }}" class="card-lembaga-link">
                    <div class="card-lembaga">
                        <div class="logo-wrapper">
                            <div class="icon-placeholder bg-kt">
                                <i class="fa-solid fa-user-group"></i>
                            </div>
                        </div>
                        <div class="title-lembaga">KARANG TARUNA</div>
                        <p class="subtitle-lembaga">Karang Taruna Desa Jatisari</p>
                    </div>
                </a>
            </div>

        </div>
    </div>
</div>
@endsection