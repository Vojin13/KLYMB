<?php

namespace Database\Seeders;

use App\Models\User;
use GuzzleHttp\Promise\Create;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory(35)->create();

        User::create([
            'first_name' => 'Vojin',
            'last_name' => 'Konatarevic',
            'username' => 'vojin',
            'email' => 'konatarevicv@gmail.com',
            'password' => Hash::make('test123'),
            'date_of_birth' => date('Y-m-d', strtotime('-18 years')),
            'email_verified_at' => now(),
            'is_active' => 1,
            'role_id' => 3
        ]);

        User::create([
            'first_name' => 'Admin',
            'last_name' => 'Admin',
            'username' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin'),
            'date_of_birth' => date('Y-m-d', strtotime('-18 years')),
            'email_verified_at' => now(),
            'is_active' => 1,
            'role_id' => 3
        ]);

        User::create([
            'first_name' => 'User',
            'last_name' => 'User',
            'username' => 'user',
            'email' => 'user@gmail.com',
            'password' => Hash::make('user'),
            'date_of_birth' => date('Y-m-d', strtotime('-18 years')),
            'email_verified_at' => now(),
            'is_active' => 1,
            'role_id' => 1
        ]);
    }
}
