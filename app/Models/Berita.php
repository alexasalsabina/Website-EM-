<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Berita extends Model
{
    use HasFactory;

    /**
     * Nama tabel
     */
    protected $table = 'beritas';

    /**
     * Mass Assignment
     */
    protected $fillable = [
        'judul',
        'slug',
        'penulis',
        'kategori',
        'isi',
        'thumbnail',
        'status',
    ];

    /**
     * Casting
     */
    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];
}