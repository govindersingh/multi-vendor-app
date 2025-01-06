<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ShopifyVariant extends Model
{
    protected $fillable = [
        'product_id', 
        'shopify_variant_id', 
        'title', 
        'price', 
        'sku', 
        'inventory_quantity'
    ];

    public function product()
    {
        return $this->belongsTo(ShopifyProduct::class);
    }

    public function images()
    {
        return $this->hasMany(ProductImage::class);
    }
}
