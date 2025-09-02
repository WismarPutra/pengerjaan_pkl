<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'email' => 'admin@example.com',
            'password' => Hash::make('admin123'), // jangan lupa di-hash
            'role' => 'admin',
        ]);

        User::create([
            'email' => 'hcm@example.com',
            'password' => Hash::make('hcm123'),
            'role' => 'hcm',
        ]);
    }
}

