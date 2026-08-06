<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agenda extends Model
{
    use HasFactory;

    /**
     * Nama tabel
     */
    protected $table = 'agendas';

    /**
     * Field yang boleh diisi
     */
    protected $fillable = [
        'judul',
        'slug',
        'lokasi',
        'penanggung_jawab',
        'tanggal_mulai',
        'tanggal_selesai',
        'deskripsi',
        'thumbnail',
        'status',
    ];

    /**
     * Casting
     */
    protected $casts = [
        'tanggal_mulai' => 'date',
        'tanggal_selesai' => 'date',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];
}