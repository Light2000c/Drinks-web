<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Address extends Model
{
    use HasFactory;

    public $fillable = [
        'user_id',
        'fullname',
        'phone',
        'delivery_address',
        'additional_information',
        'default',
        'region',
        'city',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
    
}
