<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    public function run(): void
    {

        $this->call([
        AdminSeeder::class,
        ]);
        
        User::create([
            'name' => 'Admin 1',
            'email' => 'admin1@jatisari.desa.id',
            'password' => Hash::make('makanyok'),
        ]);

        User::create([
            'name' => 'Admin 2',
            'email' => 'admin2@jatisari.desa.id',
            'password' => Hash::make('ngantuk'),
        ]);

        User::create([
            'name' => 'Admin 3',
            'email' => 'admin3@jatisari.desa.id',
            'password' => Hash::make('naseface'),
        ]);
    }
}