<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Modelcar extends Model
{
    use HasFactory;

    protected $table = 'model_cars';

    protected $fillable = [

        'name', 'user_id'
    ];
}
