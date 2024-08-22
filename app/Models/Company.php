<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Company extends Model
{
    use HasFactory;

     //Habiltar Asigancion Masiva
     protected $fillable = [

        'rut',
        'name',
        'city_id',
        'address',
        'web',
        'phone',
        'email',
        'manager',
        'image_path',

     ];

    //Definimo la relacion con City
    public function city(){
        return $this->belongsTo(City::class);
    }





}
