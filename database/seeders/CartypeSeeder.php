<?php

namespace Database\Seeders;

use App\Models\Cartype;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CartypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
      {
        $cartypes =[

            'Automovil',
            'Camioneta',
            'Fulgoneta'
            
         ];
         
         foreach ($cartypes as $cartype) {
            Cartype::create([
                'name' => $cartype,
            ]);
        }

      }
    }
}
