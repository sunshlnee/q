<?php

use App\Models\Product\Color;
use Illuminate\Database\Seeder;

class ColorsTableSeeder extends Seeder
{
    public function run()
    {
        factory(Color::class, 100)->create();
    }
}
