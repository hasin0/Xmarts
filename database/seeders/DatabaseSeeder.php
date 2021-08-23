<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserTablerSeeder::class);
       // $this->call(BannerSeeder::class);

        \App\Models\User::factory(50)->create();
        \App\Models\Category::factory(20)->create();
        

      //  \App\Models\Banner::factory(50)->create();

    }
}
