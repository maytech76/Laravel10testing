<?php

namespace Database\Seeders;

use App\Models\Modelcar;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;



class ModelCarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */

        public function run(): void
    {
        {
            $modelos = [
             'Poer',
             'Vigus',
             'Grubber',
             'Vision',
             'Sport'
            ];

            foreach ( $modelos as  $modelo) {
                Modelcar::create([
                    'name' =>  $modelo,
                ]);
            }
        }
    }
    }

