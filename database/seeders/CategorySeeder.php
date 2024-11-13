<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::truncate();

        $fileDress = asset('public/assets/dress.png');
        $fileContentDress = file_get_contents($fileDress);
        $fileDressExtension = pathinfo($fileDress, PATHINFO_EXTENSION);
        $fileNameDress = 'public/category/' . Str::random(40) . '.' . $fileDressExtension;

        $fileShorts = asset('public/assets/shorts.png');
        $fileContentShorts = file_get_contents($fileShorts);
        $fileShortsExtension = pathinfo($fileShorts, PATHINFO_EXTENSION);
        $fileNameShorts = 'public/category/' . Str::random(40) . '.' . $fileShortsExtension;

        Storage::put($fileNameDress, $fileContentDress);
        Storage::put($fileNameShorts, $fileContentShorts);

        Category::insert([
            [
                'name' => 'Baju',
                'image' => $fileNameDress,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Celana',
                'image' => $fileNameShorts,
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);
    }
}
