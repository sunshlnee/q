<?php

use Faker\Generator as Faker;
use App\Models\Product\Category;

$factory->define(Category::class, function (Faker $faker) {
    return [
        'title' => $faker->unique()->name,
        'slug' => $faker->unique()->slug(2),
        'parent_id' => null,
    ];
});
