<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
{
    User::create([
        'name' => 'Irfan',
        'email' => 'irfanromadhonwidodo86@gmail.com',
        'password' => Hash::make('irfan123'),
        'role' => 'admin',
        'status' => 'disetujui', // kalau status wajib
    ]);

    User::create([
        'name' => 'Bina',
        'email' => 'essaybina@gmail.com',
        'password' => Hash::make('irfan123'),
        'role' => 'admin',
        'status' => 'disetujui',
    ]);
}
}
