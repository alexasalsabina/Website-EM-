<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GaleriFoto extends Model
{
    protected $fillable = ['galeri_kategori_id', 'judul', 'tahun', 'keterangan', 'foto'];

    public function kategori()
    {
        return $this->belongsTo(GaleriKategori::class, 'galeri_kategori_id');
    }
}