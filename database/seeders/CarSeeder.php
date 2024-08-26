<?php

namespace Database\Seeders;

use App\Models\Car;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;



class CarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //Si existe al ejecuta de nuevo los seeders, se elimina esta carpeta
        Storage::deleteDirectory('cars');

        //Se crea de nuevo la carpeta Products VACIA
        Storage::makeDirectory('cars');

        Car::factory(5)->create();
    }
}
