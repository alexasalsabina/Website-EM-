<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

return new class extends Migration
{
    public function up(): void
    {
        $names = [
            'Masjid',
            'Kantor Desa',
            'Sekolah',
            'Pemakaman',
            'Lapangan',
            'Posyandu',
            'Wisata',
            'Kopdes',
        ];

        foreach ($names as $name) {
            DB::table('galeri_kategoris')->insertOrIgnore([
                'nama' => $name,
                'slug' => Str::slug($name),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }

    public function down(): void
    {
        DB::table('galeri_kategoris')
            ->whereIn('slug', [
                'masjid',
                'kantor-desa',
                'sekolah',
                'pemakaman',
                'lapangan',
                'posyandu',
                'wisata',
                'kopdes',
            ])
            ->delete();
    }
};
