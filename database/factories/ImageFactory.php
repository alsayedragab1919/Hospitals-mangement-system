<?php

namespace Database\Factories;
use App\Models\doctor;
use App\Models\Image;
use Illuminate\Database\Eloquent\Factories\Factory;

class ImageFactory extends Factory
{
    protected $model = Image::class;

    public function definition()
    {
        return [

            'filename'=>$this->faker->randomElement(['1.jpg','2.jpg','3.jpg','4.jpg','5.jpg','6.jpg']),
            'imageable_id'=>doctor::all()->random()->id,
            'imageable_type'=>'App\Models\doctor',
        ];
    }
}
