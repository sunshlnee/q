<?php

use App\Models\Product\Brand;
use Illuminate\Database\Seeder;

class BrandsTableSeeder extends Seeder
{
    public function run()
    {
        factory(Brand::class, 100)->create();
    }
}
