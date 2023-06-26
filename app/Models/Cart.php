<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $fillable = [
        'quantity',
        'product_id',
        'cart_code',
        'price',
        'total_price',
    ];

    public function getProductFromCart()
    {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }
}
