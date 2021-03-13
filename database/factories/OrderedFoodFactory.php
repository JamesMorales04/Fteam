<?php

namespace Database\Factories;

use App\Models\OrderedFood;
use Illuminate\Database\Eloquent\Factories\Factory;

class OrderedFoodFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = OrderedFood::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'amount' => $this->faker->numberBetween($min = 1, $max = 50),
            'subTotal' => $this->faker->randomFloat($nbMaxDecimals = 2, $min = 1, $max = 100),
        ];
    }
}
