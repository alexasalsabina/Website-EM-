<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

class ProfilKonten extends Model
{
    protected $table = 'profil_kontens';
    protected $fillable = ['kategori', 'judul', 'isi', 'foto', 'slug', 'urutan'];

    protected static function booted(): void
    {
        if (!Schema::hasTable('profil_kontens')) {
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

        static::saving(function (ProfilKonten $konten) {
            if (empty($konten->slug) || $konten->isDirty('judul')) {
                $konten->slug = Str::slug($konten->judul) . '-' . Str::random(5);
            }
        });
    }
}
