<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Generator as Faker;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Supplier>
 */
class SupplierFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'supplier_name' => $this->faker->sentence(1),
            'supplier_address' => $this->faker->paragraph(3),
            'supplier_city' => $this->faker->sentence(3),
            
        ];
    }
}
