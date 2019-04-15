<?php

use App\Models\Product\Fabric;
use Faker\Generator as Faker;

$factory->define(Fabric::class, function (Faker $faker) {
    return [
        'title' => $faker->unique()->name
    ];
});
