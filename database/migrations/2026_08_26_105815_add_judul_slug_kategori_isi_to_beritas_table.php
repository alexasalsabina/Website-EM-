<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('beritas', function (Blueprint $table) {
            $table->string('judul')->nullable();
            $table->string('slug')->nullable();
            $table->string('kategori')->nullable();
            $table->text('ringkasan')->nullable();
            $table->longText('isi')->nullable();
        });
    }

    public function down(): void
    {
        Schema::table('beritas', function (Blueprint $table) {
            $table->dropColumn(['judul', 'slug', 'kategori', 'ringkasan', 'isi']);
        });
    }
};