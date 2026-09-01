<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class GaleriKategori extends Model
{
    protected $fillable = ['nama', 'slug'];

    protected static function booted()
    {
        static::creating(function ($kategori) {
            if (empty($kategori->slug)) {
                $kategori->slug = Str::slug($kategori->nama);
            }
        });
    }

    public function fotos()
    {
        return $this->hasMany(GaleriFoto::class)->orderByDesc('tahun');
    }
}