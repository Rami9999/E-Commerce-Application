<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        \App\Models\Category::factory(6)->create();
        \App\Models\HomeCategory::factory(1)->create();
        \App\Models\Setting::factory(1)->create();
        \App\Models\Product::factory(22)->create();
    }
}
