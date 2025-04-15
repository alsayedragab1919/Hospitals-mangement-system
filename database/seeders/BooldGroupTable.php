<?php

namespace Database\Seeders;

use App\Models\Boold_Group;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BooldGroupTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
          Boold_Group::factory()->count(7)->create();
    }
}
