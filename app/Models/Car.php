<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;

    protected $fillable =[
        
        'cartype_id',
        'brand_id',
        'model_car_id',
        'year',
        'traction',
        'color',
        'position',
        'fuel_type',
        'maintenance',
        'patent',
        'klm_to_day',
        'circulation_end',
        'status',
        'image_path', // Agregar aquí

   ];

   //Definimos la relacion con  el modelo CarType
   public function cartype(){
    return $this->belongsTo(Cartype::class);
   }

   //Definimos la relacion con el modelo Brand
   public function brand(){
    return $this->belongsTo(Brand::class);
   }

   //Definimos la relacion con el modelo ModelCar
   public function model_car(){
    return $this->belongsTo(Model_car::class);
   }

}
