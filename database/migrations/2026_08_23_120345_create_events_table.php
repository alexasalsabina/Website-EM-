<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('judul');
            $table->date('tanggal');
            $table->string('waktu');
            $table->string('lokasi');
            $table->enum('status', ['publish', 'draft', 'selesai'])->default('publish');
            $table->text('deskripsi');
            $table->string('thumbnail')->nullable();
            $table->string('slug')->unique()->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};