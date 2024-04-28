<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Province;
use Faker\Generator as Faker;

$factory->define(Province::class, function (Faker $faker) {
    return [
        'name' => $faker->unique()->state,
    ];
});



