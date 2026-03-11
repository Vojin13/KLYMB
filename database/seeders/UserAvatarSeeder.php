<?php

namespace Database\Seeders;

use App\Models\UserAvatar;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserAvatarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        UserAvatar::create([
            'user_id' => 36,
            'path' => 'vojin.jpg',
            'is_active' => true,
        ]);
    }
}
