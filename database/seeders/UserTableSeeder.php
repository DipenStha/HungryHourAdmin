<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i =0; $i<100;$i++){

            DB::table("users")->insert([
                "name"=>"username".$i,
                "email"=>"user".$i."@g.com",
                "password"=>bcrypt("123456"),
                "photo"=>"https://cdn.iconscout.com/icon/free/png-256/avatar-370-456322.png"
            ]);
        }
    }
}
