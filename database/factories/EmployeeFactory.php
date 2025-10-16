<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class EmployeeFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'position' => $this->faker->randomElement(['Аспаз', 'Кассир', 'Көмекші']),
            'salary' => $this->faker->randomFloat(2, 150000, 400000),
        ];
    }
}
