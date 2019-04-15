<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {     
         $this->call(UsersTableSeeder::class);
         $this->call(CategoriesTableSeeder::class);
         $this->call(BrandsTableSeeder::class);
         $this->call(ColorsTableSeeder::class);
         $this->call(FabricsTableSeeder::class);
         $this->call(SizesTableSeeder::class);
    }
}
