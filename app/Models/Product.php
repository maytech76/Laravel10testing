<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Product extends Model
{
    protected $table = 'products';

    use HasFactory;

    protected $fillable =[
        
         'name',
         'description',
         'price',
         'stock',
         'category_id',
         'user_id',
         'image_path', // Agregar aquí

    ];

    /* Declaramos el tipo de  relacion que posee products con categories */
    public function category(){
        return $this->belongsTo(Category::class);
    }

    // Definimos la relacion entre Category y User asi podriamos relizar consultas a la tabla usuario
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
