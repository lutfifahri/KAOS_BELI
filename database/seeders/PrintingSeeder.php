<?php

namespace Database\Seeders;

use App\Models\Printing;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class PrintingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Printing::truncate();

        $faker = Faker::create('id_ID');

        for ($i = 1; $i <= 10; $i++) {
            Printing::create([
                'name' => $faker->name
            ]);
        }
    }
}
