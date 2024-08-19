<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
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
    
            foreach ($categories as $category) {
                Category::create([
                    'name' => $category,
                    'user_id' => 1, // Asume que el ID del usuario es 1
                ]);
            }
        }
    }
}
