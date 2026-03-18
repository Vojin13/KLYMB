<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            'Climbing Shoes',
            'Harnesses',
            'Ropes & Cordage',
            'Belay Devices',
            'Carabiners & Quickdraws',
            'Chalk & Chalk Bags',
            'Training & Hangboards',
            'Climbing Pants & Shorts',
            'T-Shirts & Hoodies',
            'Outerwear & Jackets',
            'Skin Care & Tape',
            'Backpacks & Gear Bags',
            'Bouldering Pads'
        ];

        foreach ($categories as $category) {
            Category::create([
                'name' => $category,
                'slug' => Str::slug($category),
            ]);
        }
    }
}
