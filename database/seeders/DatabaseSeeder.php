<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
              $this->call([
                UserTableSeeder::class,
                AdminTableSeeder::class,
              AppointmentSeeder::class,
                sectionSeeder::class,
                DoctorTableSeeder::class,
                ImageTableSeeder::class,
                PatientTableSeeder::class,
                ray_employeeSeeder::class,
                LaboratoriesEmployee::class,
                ServiceTableSeeder::class,
        ]);

    }
}
