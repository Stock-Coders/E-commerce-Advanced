<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        $this->call(UserSeeder::class);
        \App\Models\Category::factory(3)->create();
        \App\Models\SubCategory::factory(3)->create();
        \App\Models\Product::factory(15)->create();
        \App\Models\Rating::factory(6)->create();
    }
}
