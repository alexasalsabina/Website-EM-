<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

class PeraturanDesa extends Model
{
    protected $fillable = ['judul', 'tahun', 'isi', 'slug'];

    protected static function booted(): void
    {
        if (!Schema::hasTable('peraturan_desas')) {
            Schema::create('peraturan_desas', function (Blueprint $table) {
                $table->id();
                $table->string('judul');
                $table->unsignedSmallInteger('tahun');
                $table->text('isi');
                $table->string('slug')->unique();
                $table->timestamps();
            });
        }

        static::saving(function (PeraturanDesa $peraturan) {
            if (empty($peraturan->slug) || $peraturan->isDirty('judul')) {
                $peraturan->slug = Str::slug($peraturan->judul) . '-' . Str::random(5);
            }
        });
    }
}
