<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $categories = [
            'Electronicos',
            'Pinturas',
            'Cocina',
            'Hogar Moderno',
            'Jardin',
            'Deportes',
            'Herramientas',
            'Construccion',
            'Baños',
            'Plomeria',
        ];

        return [
            'name' => $this->faker->unique()->randomElement($categories),
            'user_id' => 1, // Valor por defecto
        ];
    }
}
