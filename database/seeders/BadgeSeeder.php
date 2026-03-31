<?php

namespace Database\Seeders;

use App\Models\Badge;
use Illuminate\Database\Seeder;

class BadgeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $badges = [
            [
                'name' => 'New Arrival',
                'bg_color' => '#DCFCE7',
                'text_color' => '#16A34A',
            ],
            [
                'name' => 'In Stock',
                'bg_color' => '#F3F4F6',
                'text_color' => '#4B5563',
            ],
            [
                'name' => 'Best Seller',
                'bg_color' => '#DBEAFE',
                'text_color' => '#2563EB',
            ],
            [
                'name' => 'Limited Edition',
                'bg_color' => '#FEF9C3',
                'text_color' => '#A16207',
            ],
            [
                'name' => 'Up to 35% off',
                'bg_color' => '#FEE2E2',
                'text_color' => '#DC2626',
            ],
        ];

        foreach ($badges as $badge) {
            Badge::create($badge);
        }
    }
}
