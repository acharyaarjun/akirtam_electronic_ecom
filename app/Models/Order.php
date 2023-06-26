<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'price',
        'cart_code',
        'name',
        'email',
        'phone',
        'address',
        'additional_information',
        'payment_method',
        'payment_status',
        'payment_amount',
    ];

    // database bata aauni value yesto vyera aaija
    protected $casts = [
        'deleted_at' => 'datetime',
    ];
}
