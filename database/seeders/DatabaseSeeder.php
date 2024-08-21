<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\Storage; 
use Illuminate\Database\Seeder;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        //Si existe al ejecuta de nuevo los seeders, se elimina esta carpeta
        Storage::deleteDirectory('products');


        //Se crea de nuevo la carpeta Products VACIA
        Storage::makeDirectory('products');

        //Informacion asignada en crudo para el usuario principal
        User::factory()->create([
            'name'=>'Marco Antonio',
          
            'email'=>'staroffic@gmail.com',
        
            'password'=> bcrypt('12345678')
         ]);

        $this->call([
            
                CategorySeeder::class,
                ProductSeeder::class,
            
        ]);
    }
}
