<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (Schema::hasTable('profil_kontens')) {
            return;
        }

        Schema::create('profil_kontens', function (Blueprint $table) {
            $table->id();
            $table->string('kategori');
            $table->string('judul');
            $table->text('isi');
            $table->string('foto')->nullable();
            $table->string('slug')->unique();
            $table->unsignedTinyInteger('urutan')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('profil_kontens');
    }
};
