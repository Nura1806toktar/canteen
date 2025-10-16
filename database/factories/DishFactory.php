<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class DishFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => ucfirst($this->faker->word()) . ' тағамы',
            'category_id' => rand(1, 4),
            'price' => $this->faker->randomFloat(2, 500, 2500),
        ];
    }
}
