<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;

     //Habiltar Asigancion Masiva
     protected $fillable = [

        'name',

     ];



    // Relación una city a muchas Company
    public function companies()
    {
        return $this->hasMany(Company::class);
    }
}
