<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = [

        'customertype_id',
        'rut',
        'name',
        'address',
        'phone',
        'image_path',
        'status'
    ];

    //Se declara la migracion un cliente a  un tipo de cliente
    public function customerType(){
        
        return $this->belongsTo(CustomerType::class, 'customertype_id');
    }


}
