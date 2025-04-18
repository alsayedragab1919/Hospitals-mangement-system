<?php

namespace Database\Seeders;

use App\Models\Appointment;
use App\Models\Doctor;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;

class AppointmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (App::getLocale()=='ar') {
            DB::table('appointments')->delete();
            $Appointments = [
                ['name' => 'السبت'],
                ['name' => 'الاحد'],
                ['name' => 'الاثنين'],
                ['name' => 'الثلاثاء'],
                ['name' => 'الاربعاء'],
                ['name' => 'الخميس'],
                ['name' => 'الجمعة'],
            ];
            foreach ($Appointments as $Appointment) {
                Appointment::create($Appointment);
            }
        }
    }
}
