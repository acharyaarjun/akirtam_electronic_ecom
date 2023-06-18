<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    //  kun kun field database ma add huna sakxan
    protected $fillable = [
        'category_id',
        'product_title',
        'slug',
        'product_image',
        'product_description',
        'product_stock',
        'original_cost',
        'discounted_cost',
        'status',
        'deleted_at',
        'created_at',
        'updated_at',
    ];

    // database bata aauni value yesto vyera aaija
    protected $casts = [
        'deleted_at' => 'datetime',
    ];
}
