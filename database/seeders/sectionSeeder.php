<?php

namespace Database\Seeders;

use App\Models\section;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class sectionSeeder extends Seeder
{

    public function run()
    {
        section::factory()->count(10)->create();
    }
}
