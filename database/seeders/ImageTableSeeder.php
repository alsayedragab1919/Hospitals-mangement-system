<?php

namespace Database\Seeders;

use App\Models\Image;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\App;

class ImageTableSeeder extends Seeder
{

    public function run()
    {
        Image::factory()->count(7)->create();
    }
}
