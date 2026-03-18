<?php

namespace Database\Seeders;

use App\Models\Badge;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BadgeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $badges = ['New Arrival', 'In Stock' ,'Best Seller', 'Limited Edition', 'Up to 35% off'];

        foreach($badges as $badge) {
            Badge::create([
                'name' => $badge,
            ]);
        }
    }
}
