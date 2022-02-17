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


            [
                'full_name'=>'antu customer',
                'username'=>'customer',
                'email'=>'customer@gmail.com',
                'password'=>Hash::make('1111'),
             //   'role'=>'customer',
                'status'=>'active,'

            ],


               //admin
            //[
                //'full_name'=>'Hassan admin',
                //'username'=>'Admin',
                //'email'=>'admin@gmail.com',
                //'password'=>Hash::make('1111'),
             //   'role'=>'admin',
              //  'status'=>'active,'

            //],

            //seller
           // [
             //   'full_name'=>'ummi seller',
               // 'username'=>'vendor',
                //'email'=>'vendor@gmail.com',
                //'password'=>Hash::make('2222'),
                //'role'=>'seller',
                //'status'=>'active,'

            //],
            //customer


        ]);
        //admins



        DB::table('admins')->insert([


            [
                'full_name'=>'antu Admin',
                //'username'=>'Admin',
                'email'=>'admin@gmail.com',
                'password'=>Hash::make('3333'),
             //   'role'=>'customer',
                'status'=>'active,'

            ],
        ]);








        DB::table('sellers')->insert([


            [
                'full_name'=>'Hassan Seller',
                'username'=>'Seller',
                'address'=>'GRA minna',
                'phone'=>'0812323322',
                'photo'=>'',
                'email'=>'Seller@gmail.com',
                'password'=>Hash::make('3333'),
             //   'role'=>'customer',
                'status'=>'active,'

            ],
        ]);
    }
}
