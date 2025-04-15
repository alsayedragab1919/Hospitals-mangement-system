<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\RayEmployee;
use Illuminate\Support\Facades\Hash;
class ray_employeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $ray_employee = new RayEmployee();
        $ray_employee->name = 'محمد السيد';
        $ray_employee->email = 'm@yahoo.com';
        $ray_employee->password = Hash::make('123456789');
        $ray_employee->save();
    }
}
