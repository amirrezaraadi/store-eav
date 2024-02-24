<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        for ($i = 1; $i <= 50; $i++){
            $user = User::create([
                'first_name' => 'Admin',
                'last_name' => 'Admin',
                'email' => fake()->email,
                'phone' => str_pad(random_int(0, 9999999), 13, '0', STR_PAD_LEFT),
                'password' => bcrypt('secret'),
            ]);
        }

    }
}
