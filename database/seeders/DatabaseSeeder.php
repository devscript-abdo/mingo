<?php

namespace Database\Seeders;

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
        // \App\Models\User::factory(10)->create();

        //\App\Models\Ads::factory(33)->create();
        //\App\Models\Slider::factory(10)->create();
        // $this->call(AttributeSeeder::class);
        // $this->call(CouponsTableSeeder::class);
        $this->call(ProductSeeder::class);
    }
}
