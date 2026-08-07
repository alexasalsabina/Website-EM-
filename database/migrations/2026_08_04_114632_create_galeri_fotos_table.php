<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('galeri_fotos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('galeri_kategori_id')
                  ->constrained('galeri_kategoris')
                  ->onDelete('cascade');
            $table->string('judul');
            $table->unsignedSmallInteger('tahun');
            $table->text('keterangan')->nullable();
            $table->string('foto'); // path gambar
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('galeri_fotos');
    }
};