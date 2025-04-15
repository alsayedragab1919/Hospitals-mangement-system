<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Service;
class ServiceTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $SingleService = new Service();
        $SingleService->price = 500;
        $SingleService->status = 1;
        $SingleService->save();

        // store trans
        $SingleService->name = 'كشف';
        $SingleService->save();
    }
}
