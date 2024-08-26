<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Driver extends Model
{
    use HasFactory;

    protected $fillable =[

        'license_id',
        'user_id',
        'run',
        'name',
        'lastname',
        'birth',
        'address',
        'phone',
        'email', 
        'contact',
        'contact_phone',
        'bank_details',
        'license_end',
        'blood_type',
        'pathology',
        'image_path',
        'status'

    ];

    public function license(){
        return $this->belongsTo(License::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
