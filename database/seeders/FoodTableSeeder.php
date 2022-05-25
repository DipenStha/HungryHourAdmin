<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FoodTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i =0; $i<100;$i++){

            DB::table("food")->insert([
                "name"=>"food".$i,
                "price"=>rand(100,500),
                "restaurant_id"=>rand(101,110),
                "category_id"=>rand(1,9),


            ]);
        }
    }
}
