<?php

namespace Database\Seeders;

use App\Models\Brand;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $brands = [
            [
                'name' => 'La Sportiva',
                'description' => 'Technical footwear and clothing for climbing, mountaineering, and trail running. Founded in the Italian Dolomites.',
                'website' => 'https://www.lasportiva.com'
            ],
            [
                'name' => 'Petzl',
                'description' => 'World leader in climbing gear, headlamps, and equipment for vertical environments and rescue.',
                'website' => 'https://www.petzl.com'
            ],
            [
                'name' => 'Black Diamond',
                'description' => 'High-performance climbing, skiing, and mountain gear designed for the global mountain community.',
                'website' => 'https://www.blackdiamondequipment.com'
            ],
            [
                'name' => 'Scarpa',
                'description' => 'Italian craftsmanship at its best, specializing in performance climbing shoes and mountain boots.',
                'website' => 'https://www.scarpa.com'
            ],
            [
                'name' => 'Mammut',
                'description' => 'Swiss premium outdoor brand providing high-quality ropes, harnesses, and technical apparel since 1862.',
                'website' => 'https://www.mammut.com'
            ],
            [
                'name' => 'E9',
                'description' => 'The original climbing lifestyle brand. Creative, colorful, and sustainable climbing apparel from Italy.',
                'website' => 'https://www.enove.it'
            ],
            [
                'name' => 'Edelrid',
                'description' => 'German climbing gear specialist known for inventing the Kernmantle rope and eco-friendly production.',
                'website' => 'https://www.edelrid.com'
            ],
            [
                'name' => 'Ocun',
                'description' => 'Innovative climbing hardware and shoes from the Czech Republic, focused on high-end engineering.',
                'website' => 'https://www.ocun.com'
            ],
        ];

        foreach ($brands as $brand) {
            $brand['slug'] = Str::slug($brand['name']);

            Brand::create($brand);
        }
    }
}
