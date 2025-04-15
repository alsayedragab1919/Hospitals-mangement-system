<?php

namespace Database\Factories;

use App\Models\Boold_Group;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Boold_Group>
 */
class Boold_GroupFactory extends Factory
{
    protected $model = Boold_Group::class;

    public function definition()
    {
        return [
            'name' => $this->faker->unique()->randomElement(['A+', 'A-', 'B+', 'B-','O+', 'O-','AB+', 'AB-']),
        ];
    }
}
