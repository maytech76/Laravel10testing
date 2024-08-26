<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Car>
 */
class CarFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'cartype_id' => $this->faker->numberBetween(1, 3),
            'brand_id' => $this->faker->numberBetween(1, 4),
            'model_car_id'=> $this->faker->numberBetween(1, 5),
            'year' => $this->faker->year($max = '2024', $min = '2022'), // Año entre 2022 y 2024
            'traction' => $this->faker->randomElement(['2x2', '4x4']), // Valor entre 2x2 y 4x4
            'color' => 'Blanco', // Color blanco por defecto
            'position' => 4, // 4 puestos por defecto
            'fuel_type' => $this->faker->randomElement(['Gasolina', 'Diesel']), // Entre Gasolina y Diesel
            'patent' => strtoupper($this->faker->bothify('??####')), // Valor random de 6 caracteres
            'klm_to_day' => 10500, // 10,500 por defecto
            'circulation_end' => '2027-12-20',
            'image_path' => 'cars/' . $this->faker->image('public/storage/cars', 640, 480, null, false),
        ];
    }
}
