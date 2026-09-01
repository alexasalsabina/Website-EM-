<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Prestasi extends Model
{
    protected $fillable = [
        'foto',
        'nama',
        'tanggal',
        'hari',
        'keterangan',
    ];

    protected $casts = [
        'tanggal' => 'date',
    ];
}