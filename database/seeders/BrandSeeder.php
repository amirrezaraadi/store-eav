<?php

namespace Database\Seeders;

use App\Models\Brand;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BrandSeeder extends Seeder
{

    public function run(): void
    {
        for ($i = 1; $i <= 100; $i++) {
            Brand::query()->create([
                'title' => fake()->title(),
                'title_en' => fake()->title(),
                'slug' => fake()->unique()->slug,
                'slug_en' => fake()->unique()->slug,
                'address' => fake()->name(),
                'site' => fake()->name(),
                'phone' => str_pad(random_int(0, 9999999), 13, '0', STR_PAD_LEFT),
                'image' => fake()->imageUrl(),
                'description' => fake()->text,
                'special' => 1,
                'user_id' => 1
            ]);
        }
    }
}
