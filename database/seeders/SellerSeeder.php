<?php

namespace Database\Seeders;

use App\Models\Seller\Seller;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class SellerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        for ($i = 1; $i <= 150; $i++) {
            Seller::query()->create([
                'first_name' => fake()->name,
                'last_name' => fake()->name,
                'point' => fake()->name,
                'email' => fake()->unique()->email(),
                'phone' => str_pad(random_int(0, 9999999), 13, '0', STR_PAD_LEFT),
                'cart_number' => fake()->text,
            ]);
        }
    }
}
