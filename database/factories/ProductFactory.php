<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => $this->faker->word(),
            'category_id' => rand(1, 3),
            'unit' => $this->faker->randomElement(['кг', 'л', 'дана']),
            'price' => $this->faker->randomFloat(2, 100, 1000),
            'stock_quantity' => $this->faker->randomFloat(2, 10, 200),
        ];
    }
}

