<?php

use App\Models\Product\Size;
use Illuminate\Database\Seeder;

class SizesTableSeeder extends Seeder
{
    public function run()
    {
        factory(Size::class, 100)->create();
    }
}
