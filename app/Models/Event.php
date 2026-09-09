<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'judul',
        'tanggal',
        'waktu',
        'lokasi',
        'status',
        'deskripsi',
        'thumbnail',
        'slug',
    ];

    protected $casts = [
        'tanggal' => 'date',
    ];

    public function fotos()
    {
        return $this->hasMany(EventFoto::class);
    }

    protected static function booted(): void
    {
        if (!Schema::hasTable('event_fotos')) {
            Schema::create('event_fotos', function (Blueprint $table) {
                $table->id();
                $table->foreignId('event_id')->constrained()->cascadeOnDelete();
                $table->string('foto');
                $table->timestamps();
            });
        }

        static::saving(function (Event $event) {
            if (empty($event->slug)) {
                $event->slug = Str::slug($event->judul) . '-' . Str::random(5);
            }
        });
    }
}