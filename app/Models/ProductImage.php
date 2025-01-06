<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{
    protected $fillable = [
        'product_id', 
        'variant_id', 
        'image_url', 
        'position', 
        'is_primary'
    ];

    public function product()
    {
        return $this->belongsTo(ShopifyProduct::class);
    }

    public function variant()
    {
        return $this->belongsTo(ShopifyVariant::class);
    }
}
