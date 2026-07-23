@extends('layouts.app')

@section('content')

@vite('resources/css/aspirasi.css')


<section class="aspirasi-page">

    <div class="aspirasi-header">
        <h1>Aspirasi Warga</h1>
        <p>
            Sampaikan keluhan, masukan, dan ide Anda
            untuk kemajuan Desa Jatisari.
        </p>
    </div>


    <div class="aspirasi-container">

        <form class="aspirasi-form">


            <div class="form-group">
                <label>Nama</label>
                <input 
                    type="text" 
                    placeholder="Masukkan nama (opsional)">
            </div>


            <div class="form-group">
                <label>Dusun / RT / RW</label>
                <input 
                    type="text" 
                    placeholder="Contoh: Dusun Jatisari RT 02">
            </div>


            <div class="form-group">
                <label>Kategori Aspirasi</label>

                <select>
                    <option>Pilih kategori</option>
                    <option>Infrastruktur</option>
                    <option>Kebersihan</option>
                    <option>Pendidikan</option>
                    <option>Kesehatan</option>
                    <option>Pelayanan Desa</option>
                    <option>Lainnya</option>
                </select>

            </div>


            <div class="form-group">
                <label>Isi Aspirasi</label>

                <textarea 
                    rows="5"
                    placeholder="Tuliskan aspirasi Anda...">
                </textarea>

            </div>


            <div class="form-group">
                <label>
                    Foto Pendukung (opsional)
                </label>

                <input type="file">
            </div>


            <button type="submit">
                Kirim Aspirasi
            </button>


        </form>


        <div class="aspirasi-info">

            <img 
                src="{{ asset('images/village.png') }}"
                alt="Desa">

            <h2>
                Suara Anda Penting
            </h2>

            <p>
                Aspirasi masyarakat membantu
                Pemerintah Desa Jatisari
                mengetahui kebutuhan warga.
            </p>

        </div>


    </div>


</section>


@endsection