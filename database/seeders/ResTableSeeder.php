<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ResTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i =0; $i<10;$i++){

            DB::table("restaurants")->insert([
                "name"=>"username".$i,
                "status"=>1,
                "address"=>"Pokhara",
                "logo"=>"https://cdn.iconscout.com/icon/free/png-256/avatar-370-456322.png"
            ]);
        }
    }
}
