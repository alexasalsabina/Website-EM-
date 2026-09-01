<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InovasiDesa extends Model
{
    protected $fillable = [
        'judul',
        'deskripsi',
        'status',
        'urutan',
        'gambar',
    ];
}