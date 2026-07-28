@extends('layouts.app')

@section('content')

@vite([
    'resources/css/aspirasi.css',
    'resources/js/aspirasi.js'
])

@if(session('success'))
<div class="alert-success" id="successAlert">
    <div class="alert-icon">✓</div>
    <div class="alert-content">
        <strong>Berhasil!</strong>
        <p>{{ session('success') }}</p>
    </div>
    <button type="button" class="alert-close" onclick="closeAlert()">
        &times;
    </button>
</div>
@endif

<section class="aspirasi-page">
    <div class="aspirasi-header">
        <h1>Aspirasi Warga</h1>
        <p>
            Sampaikan keluhan, masukan, dan ide Anda
            untuk kemajuan Desa Jatisari.
        </p>
    </div>

    <div class="aspirasi-container">
        <form
            class="aspirasi-form"
            action="{{ route('aspirasi.store') }}"
            method="POST"
            enctype="multipart/form-data"
        >
            @csrf

            <div class="form-group">
                <label>Nama</label>
                <input 
                    type="text"
                    name="nama"
                    placeholder="Masukkan nama (opsional)">
            </div>

            <div class="form-group">
                <label>Dusun / RT / RW</label>
                <input 
                    type="text" 
                    name="alamat"
                    placeholder="Contoh: Dusun Jatisari RT 02">
            </div>

            <div class="form-group">
                <label>Kategori Aspirasi</label>
                <select name="kategori">
                    <option value="">Pilih kategori</option>
                    <option value="Infrastruktur">Infrastruktur</option>
                    <option value="Kebersihan">Kebersihan</option>
                    <option value="Pendidikan">Pendidikan</option>
                    <option value="Kesehatan">Kesehatan</option>
                    <option value="Pelayanan Desa">Pelayanan Desa</option>
                    <option value="Lainnya">Lainnya</option>
                </select>
            </div>

            <div class="form-group">
                <label>Isi Aspirasi</label>
                <textarea
                    name="isi_aspirasi"
                    rows="5"
                    placeholder="Tuliskan aspirasi Anda...">
                </textarea>
            </div>

            <div class="form-group">
                <label>
                    Foto Pendukung (opsional)
                </label>
                <input
                    type="file"
                    name="foto"
                    accept="image/"
                >
            </div>

            <button type="submit" class="submit-btn">
                <svg xmlns="http://www.w3.org/2000/svg"
                    width="20"
                    height="20"
                    viewBox="0 0 24 24"
                    fill="none"
                    stroke="currentColor"
                    stroke-width="2"
                    stroke-linecap="round"
                    stroke-linejoin="round">
                    <path d="M22 2L11 13"/>
                    <path d="M22 2L15 22L11 13L2 9L22 2Z"/>
                </svg>

                <span>Kirim Aspirasi</span>
            </button>
        </form>
    </div>
</section>
@endsection