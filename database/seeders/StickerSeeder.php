<?php

namespace Database\Seeders;

use App\Models\Sticker;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class StickerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Sticker::truncate();

        $faker = Faker::create('id_ID');

        for ($i = 1; $i <= 10; $i++) {
            Sticker::create([
                'name' => $faker->name,
                'price' => rand(20000, 100000)
            ]);
        }
    }
}
