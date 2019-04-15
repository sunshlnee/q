<?php

use App\Models\Product\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    $code = $faker->randomNumber;
    $word = $faker->word;                                            
    return [
        'slug' => $word.$code,
        'code' => $code,
        'views' => $faker->randomNumber,
        'recommended' => $faker->boolean,
        'category_id' => rand(1, 67),
        'brand_id' => rand(1, 300)
    ];
});
