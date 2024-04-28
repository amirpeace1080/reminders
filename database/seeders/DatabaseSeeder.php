<?php

namespace Database\Factories;

use App\Models\Province;
use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Generator as Faker;

class ProvinceFactory extends Factory
{
    protected $model = Province::class;

    public function definition()
    {
        return [
            'name' => $this->faker->unique()->state,
        ];
    }
}
