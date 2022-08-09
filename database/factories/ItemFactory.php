<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Generator as Faker;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Item>
 */
class ItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'item_name' => $this->faker->sentence(1),
            'description' => $this->faker->paragraph(3),
            'quantity' => $this->faker->randomDigit(),
            'category' => $this->faker->sentence(1),
            'price' => $this->faker->numberBetween(1.99, 99.99),
        ];
    }
    
}
