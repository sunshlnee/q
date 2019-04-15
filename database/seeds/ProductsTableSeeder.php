<?php

use App\Models\Product\Product;
use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    public function run()
    {
        factory(Product::class, 100)->create();
    }
}
