<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('penduduks', function (Blueprint $table) {
            $table->id();

            // Data Diri
            $table->string('nama');
            $table->string('nik', 16)->unique()->nullable();
            $table->enum('jenis_kelamin', ['Laki-laki', 'Perempuan']);
            $table->date('tanggal_lahir')->nullable();

            // Demografi
            $table->string('dusun')->nullable();
            $table->string('rt')->nullable();
            $table->string('rw')->nullable();
            $table->string('alamat')->nullable();

            // Status Sosial & Pendidikan
            $table->enum('status_perkawinan', [
                'Belum Kawin',
                'Kawin',
                'Cerai Hidup',
                'Cerai Mati',
            ])->nullable();

            $table->enum('pendidikan_terakhir', [
                'Tidak/Belum Sekolah',
                'SD',
                'SMP',
                'SMA',
                'D3',
                'S1',
                'S2/S3',
            ])->nullable();

            // Pekerjaan
            $table->enum('pekerjaan', [
                'Belum Bekerja',
                'Pelajar/Mahasiswa',
                'PNS/ASN',
                'TNI/Polri',
                'Petani/Buruh Tani',
                'Pedagang/Wiraswasta',
                'Karyawan Swasta',
                'Buruh Harian',
                'Nelayan',
                'Pensiunan',
                'Ibu Rumah Tangga',
                'Lainnya',
            ])->nullable();

            // Disabilitas
            $table->boolean('penyandang_disabilitas')->default(false);
            $table->enum('jenis_disabilitas', [
                'Disabilitas Fisik',
                'Disabilitas Netra',
                'Disabilitas Rungu/Wicara',
                'Disabilitas Mental',
                'Disabilitas Fisik dan Mental',
                'Lainnya',
            ])->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penduduks');
    }
};