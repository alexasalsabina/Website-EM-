<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        User::updateOrCreate(['email' => 'admin1@jatisari.desa.id'], [
            'name' => 'Admin 1',
            'password' => Hash::make('makanyok'),
        ]);

        User::updateOrCreate(['email' => 'admin2@jatisari.desa.id'], [
            'name' => 'Admin 2',
            'password' => Hash::make('ngantuk'),
        ]);

        User::updateOrCreate(['email' => 'admin3@jatisari.desa.id'], [
            'name' => 'Admin 3',
            'password' => Hash::make('naseface'),
        ]);
    }
}