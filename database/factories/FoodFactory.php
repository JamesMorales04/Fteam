<?php

namespace Database\Factories;

use App\Models\Food;
use Illuminate\Database\Eloquent\Factories\Factory;

class FoodFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Food::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $food = \Faker\Factory::create();
        $food->addProvider(new \FakerRestaurant\Provider\en_US\Restaurant($food));

        return [
            'name' => $food->foodName(),
            'availability' => $this->faker->boolean(),
            'recipe' => $this->faker->text(),
            'description' => $this->faker->text(),
            'price' => $this->faker->randomFloat($nbMaxDecimals = 2, $min = 1, $max = 100),
        ];
    }
}
