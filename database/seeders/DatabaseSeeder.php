<?php

namespace Database\Seeders;

use App\Models\CreditCard;
use App\Models\Food;
use App\Models\Ingredients;
use App\Models\Order;
use App\Models\OrderedFood;
use App\Models\User;
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
        Food::factory(10)->create();
        Ingredients::factory(10)->create();
        User::factory(10)->create();
        CreditCard::factory(10)->create();
        Order::factory(10)->create();
    }
}
