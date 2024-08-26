<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Driver>
 */
class DriverFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
        'license_id'=>$this->faker->numberBetween(1,3),
        'user_id'=>'1',
        'run'=>strtoupper($this->faker->bothify('??##########')),
        'name'=> $this->faker->randomElement(['Marco', 'Rixio', 'Jose', 'David', 'Ramon','jesus']),
        'last_name'=> $this->faker->randomElement(['Yanez', 'Monsalbe', 'Gonzales', 'Sola', 'Castillo','Camargo']),
        'birth'=> '2000-12-20',
        'address'=>'La Serena, Coquimbo, Chile',
        'phone'=>'+56950874125',
        'email'=>'registro@gmail.com', 
        'contact'=>'persona contacto',
        'contact_phone'=>'+56950874125',
        'bank_details'=>'Banco: Estado, Cuenta: Rut, Numero:123456790, Email:banco@gmail.com',
        'license_end'=> '2027-12-20',
        'blood_type'=> 'ORH +',
        'pathology'=> 'Alergia  a la penicilina',
        'image_path' => 'drivers/' . $this->faker->image('public/storage/drivers', 640, 480, null, false),
        
        ];
    }
}
