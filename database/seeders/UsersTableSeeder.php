<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        // Kosongkan tabel users
        DB::table('users')->truncate();

        // Tambahkan user Admin
        DB::table('users')->insert([
            'name' => 'Admin Mawar',
            'email' => 'admin@gmail.com',
            'role' => 'admin',
            'email_verified_at' => now(),
            'password' => Hash::make('password123'),
            'remember_token' => Str::random(10),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Tambahkan user Pengelola
        DB::table('users')->insert([
            'name' => 'Pengelola Budi',
            'email' => 'pengelola@gmail.com',
            'role' => 'pengelola',
            'email_verified_at' => now(),
            'password' => Hash::make('password123'),
            'remember_token' => Str::random(10),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
