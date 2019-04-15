<?php

use App\Models\Product\Size;
use Faker\Generator as Faker;

$factory->define(Size::class, function (Faker $faker) {
    return [
        'title' => $faker->unique()->randomNumber
    ];
});
