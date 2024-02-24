<?php

namespace Database\Seeders;

use App\Models\Panel\CategoryProduct;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i <= 50; $i++)
        {
            CategoryProduct::query()->create([
                'name' => fake()->title,
                'slug' => fake()->unique()->name,
                'image' => fake()->imageUrl,
                'content' => fake()->text,
                'show_in_menu' => 1 ,
                'parent_id' => null,
            ]);
        }
    }
}
