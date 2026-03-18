<?php

namespace Database\Seeders;

use App\Models\Price;
use App\Models\Product;
use App\Models\ProductImage;
use Database\Factories\ProductFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::factory(100)->create()->each(function (Product $product) {

            Price::create([
                'price' => fake()->randomFloat(2, 15, 300),
                'valid_from' => now()->subDays(7),
                'is_active' => true,
                'product_id' => $product->id
            ]);

            Price::create([
                'price' => fake()->randomFloat(2, 15, 300),
                'valid_from' => now()->subDays(rand(8,15)),
                'is_active' => false,
                'valid_to' => now()->subDays(7),
                'product_id' => $product->id
            ]);

            $imageNumber = rand(1,8);
            $image = 'image'.$imageNumber.'.png';

            ProductImage::create([
                'is_primary' => true,
                'position' => 1,
                'product_id' => $product->id,
                'path' => $image
            ]);

            $imageNumber = rand(1,8);
            $image = 'image'.$imageNumber.'.png';

            ProductImage::create([
                'is_primary' => false,
                'position' => 2,
                'product_id' => $product->id,
                'path' => $image
            ]);

        });
    }
}
