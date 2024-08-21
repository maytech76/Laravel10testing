<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->words(2, true), // Genera un nombre de producto con 2 palabras
            'description' => $this->faker->text(), // Genera una descripción de producto
            'category_id' => $this->faker->numberBetween(1, 10), // Número aleatorio entre 1 y 10 para category_id
            'price' => $this->faker->randomFloat(2, 2000, 10000), // Precio aleatorio entre 2000 y 10000 con 2 decimales
            'stock' => $this->faker->numberBetween(1, 10), // Stock aleatorio entre 1 y 10
            'image_path' => 'products/' . $this->faker->image('public/storage/products', 640, 480, null, false),
            'user_id'=> 1
        ];
    }
}
