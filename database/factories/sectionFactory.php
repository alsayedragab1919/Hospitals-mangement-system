<?php

namespace Database\Factories;

use App\Models\section;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\section>
 */
class sectionFactory extends Factory
{
    protected $model = Section::class;

    public function definition()
    {
        return [
            'name' => $this->faker->unique()->randomElement(['قسم القلب والاوعيه الدمويه','طب وجراحة العين','جراحة العظام والمفاصل','قسم النسا والولاده','قسم الاسنان','قسم الانف والاذن والحنجره','قسم المخ والاعصاب','جراحة التجميل والحروق','الجراحة العامة','طب الأطفال']),
        ];
    }
}
