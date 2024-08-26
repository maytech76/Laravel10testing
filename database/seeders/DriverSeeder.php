<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Driver;
use Illuminate\Support\Facades\Storage;

class DriverSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
          //Si existe al ejecuta de nuevo los seeders, se elimina esta carpeta
          Storage::deleteDirectory('drivers');

          //Se crea de nuevo la carpeta Products VACIA
          Storage::makeDirectory('drivers');
  
          /* Cantidad de Drivers a fabricar */
  
          Driver::factory(10)->create();
    }
}
