<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    protected $fillable = [
        'order_id', 
        'variant_id', 
        'quantity', 
        'price'
    ];

    public function order()
    {
        return $this->belongsTo(ShopifyOrder::class);
    }

    public function variant()
    {
        return $this->belongsTo(ShopifyVariant::class);
    }
}
