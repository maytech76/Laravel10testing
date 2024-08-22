<?php

namespace Database\Seeders;

use App\Models\City;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


class CitypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        {
            $cities = [
             'Andacollo',
             'La Serena',
             'Coquimbo',
             'Ovalle',
             'Vicuña',
             'La Higuera',
             'Monte Patria',
             'Punitaqui',
             'Combarbala',
             'Canela',
             'Illapel',
             'Salamanca',
             'Los Vilos',
             'Tongoy',
             'Paiguano'
            ];

            foreach($cities as $city){
                City::create( [
                    'name' => $city,
                ]);
            }
        }
    }
}
