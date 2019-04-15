<?php

use App\Models\Product\Fabric;
use Illuminate\Database\Seeder;

class FabricsTableSeeder extends Seeder
{
    public function run()
    {
        factory(Fabric::class, 100)->create();
    }
}
