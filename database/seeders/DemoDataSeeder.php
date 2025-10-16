<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\{ProductCategory, Product, DishCategory, Dish, Employee};

class DemoDataSeeder extends Seeder
{
    public function run(): void
    {
        // Өнім түрлері
        ProductCategory::insert([
            ['name' => 'Ет өнімдері'],
            ['name' => 'Көкөністер'],
            ['name' => 'Дәмдеуіштер'],
        ]);

        // Тағам түрлері
        DishCategory::insert([
            ['name' => 'Ыстық тағам'],
            ['name' => 'Тіскебасар'],
            ['name' => 'Десерт'],
            ['name' => 'Сусын'],
        ]);

        // Өтірік өнімдер
        Product::factory(30)->create();

        // Өтірік тағамдар
        Dish::factory(15)->create();

        // Қызметкерлер (faker)
        Employee::factory(5)->create();

        // Бас повар Жандостов Жеңіс
        Employee::create([
            'name' => 'Жандостов Жеңіс',
            'position' => 'Бас повар',
            'salary' => 550000,
        ]);

    }
}



