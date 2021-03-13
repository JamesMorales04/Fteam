<?php

namespace Database\Seeders;

use App\Models\Food;
use App\Models\OrderedFood;
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
        Food::factory(8)->create();
        OrderedFood::factory(8)->create();
    }
}
