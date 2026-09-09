<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (Schema::hasTable('event_fotos')) {
            return;
        }

        Schema::create('event_fotos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('event_id')->constrained()->cascadeOnDelete();
            $table->string('foto');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('event_fotos');
    }
};
