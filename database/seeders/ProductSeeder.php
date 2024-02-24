<?php

namespace Database\Seeders;

use App\Models\Product;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        for ($i = 1; $i <= 1000; $i++) {
            Product::query()->create([
                'title' => fake()->title(),
                'title_en' => fake()->title(),
                'slug' => fake()->unique()->slug,
                'slug_en' => fake()->unique()->slug,
                'intro_production' => fake()->text,
                'image' => fake()->imageUrl(),
                'marketable' => 'success',
                'brand_id' => 1,
                'category_id' => 1,
//                'published_at' => fake()->date
            ]);
        }
    }
}
