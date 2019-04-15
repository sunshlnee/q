<?php

use App\Models\Product\Color;
use Faker\Generator as Faker;

$factory->define(Color::class, function (Faker $faker) {
    return [
        'title' => $faker->unique()->colorName,
    ];
});
