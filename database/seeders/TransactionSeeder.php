<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\Sticker;
use App\Models\Transaction;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use App\Models\TransactionDetail;

class TransactionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Transaction::truncate();
        TransactionDetail::truncate();

        $faker = Faker::create('id_ID');

        for ($i = 1; $i <= 10; $i++) {
            $transaction = Transaction::create([
                'number' => rand(0000000, 9999999),
                'name' => $faker->name,
                'email' => $faker->email,
                'phone' => $faker->phoneNumber,
                'city' => $faker->city,
                'address' => $faker->streetAddress
            ]);

            for ($d = 1; $d <= rand(1, 5); $d++) {
                $product = Product::inRandomOrder()->first();
                $sticker = Sticker::inRandomOrder()->first();

                $transaction->transactionDetail()->create([
                    'product_id' => $product->id,
                    'sticker_id' => $sticker->id,
                    'price_product' => $product->price,
                    'price_sticker' => $sticker->price,
                    'qty' => rand(1, 5)
                ]);
            }
        }
    }
}
