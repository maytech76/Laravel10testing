<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Category extends Model
{
    protected $table = 'categories';

    use HasFactory;

    protected $fillable = [

        'name', 'user_id'
    ];

    // Definimos la relacion entre Category y User asi podriamos relizar consultas a la tabla usuario
    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
