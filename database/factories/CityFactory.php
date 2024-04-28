<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

use App\Models\City;
use Faker\Generator as Faker;

$factory->define(City::class, function (Faker $faker) {
    return [
        'province_id' => factory(App\Models\Province::class)->create()->id,
        'name' => $faker->city,
    ];
});

