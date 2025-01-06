<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ShopifyProduct extends Model
{
    protected $fillable = [
        'vendor_id', 
        'brand_id', 
        'category_id', 
        'shopify_product_id', 
        'title', 
        'description', 
        'option1', 
        'option2', 
        'option3'
    ];

    public function vendor()
    {
        return $this->belongsTo(Vendor::class);
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function images()
    {
        return $this->hasMany(ProductImage::class);
    }

    public function variants()
    {
        return $this->hasMany(ShopifyVariant::class);
    }
}
