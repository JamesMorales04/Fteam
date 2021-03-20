<?php

namespace Database\Factories;

use App\Models\Ingredients;
use Illuminate\Database\Eloquent\Factories\Factory;

class IngredientsFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Ingredients::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $ingredients = \Faker\Factory::create();
        $ingredients->addProvider(new \FakerRestaurant\Provider\en_US\Restaurant($ingredients));

        return [
            'name' => $ingredients->vegetableName(),
            'price' => $this->faker->randomFloat($nbMaxDecimals = 2, $min = 1, $max = 100),
            'amount' => $this->faker->numberBetween($min = 15, $max = 100),
        ];
    }
}