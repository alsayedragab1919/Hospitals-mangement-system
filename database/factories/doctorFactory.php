<?php

namespace Database\Factories;

use App\Models\section;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Doctor;
use App\Models\doctortranslation;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\doctor>
 */
class doctorFactory extends Factory
{
    protected $model = Doctor::class;

    public function definition()
    {
        return [

            'name' => $this->faker->text(16),
            'email' => $this->faker->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'phone' => $this->faker->phoneNumber,
            'section_id'=>section::all()->random()->id,
            'number_of_statements' =>$this->faker->randomDigit(),




        ];
    }
}
