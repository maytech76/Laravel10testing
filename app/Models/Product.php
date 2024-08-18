<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';

    use HasFactory;

    protected $fillable =[
         'name',
         'description',
         'price',
         'stock',
         'category_id'
    ];

    /* Declaramos el tipo de  relacion que posee products con categories */
    public function category(){
        return $this->belongsTo(Category::class);
    }
}
