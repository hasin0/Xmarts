<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class UserTablerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([

            //admin
            [
                'full_name'=>'Hassan admin',
                'username'=>'Admin',
                'email'=>'admin@gmail.com',
                'password'=>Hash::make('1111'),
                'role'=>'admin',
                'status'=>'active,'

            ],

            //vendor
            [
                'full_name'=>'ummi vendor',
                'username'=>'vendor',
                'email'=>'vendor@gmail.com',
                'password'=>Hash::make('2222'),
                'role'=>'vendor',
                'status'=>'active,'

            ],
            //customer
            [
                'full_name'=>'antu customer',
                'username'=>'customer',
                'email'=>'customer@gmail.com',
                'password'=>Hash::make('3333'),
                'role'=>'customer',
                'status'=>'active,'

            ],


        ]);
        //
    }
}
