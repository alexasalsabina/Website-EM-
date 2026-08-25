<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
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

    protected static function booted(): void
    {
        static::saving(function (Event $event) {
            if (empty($event->slug)) {
                $event->slug = Str::slug($event->judul) . '-' . Str::random(5);
            }
        });
    }
}