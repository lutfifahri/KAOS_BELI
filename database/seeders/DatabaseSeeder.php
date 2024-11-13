<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Storage::deleteDirectory('public');

        
        $this->call(CategorySeeder::class);
        $this->call(ProductSeeder::class);
        $this->call(TransactionSeeder::class);
        $this->call(UserSeeder::class);
    }
}
