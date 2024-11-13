<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\Category;
use App\Models\Printing;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::truncate();

        for ($i = 1; $i <= 10; $i++) {
            Product::create([
                'printing_id' => Printing::inRandomOrder()->first()->id,
                'category_id' => Category::inRandomOrder()->first()->id,
                'price' => rand(10000, 100000)
            ]);
        }
    }
}
