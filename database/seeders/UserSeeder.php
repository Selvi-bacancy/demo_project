<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //admin 
        DB::table('users')->insert([
            "name"=>"Selvi",
            "email"=>"selvi@gmail.com",
            "password"=> Hash::make("123"),
            "role"=>"0",
            "status"=>"1"
        ]);


        DB::table('users')->insert([

            "name"=>"jane doe",
            "email"=>"jane@gmail.com",
            "password"=> Hash::make("jane123"),
            "role"=>"1",
            "status"=>"1"
        ]
        );

        
    }
}
