<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ShopifyOrder extends Model
{
    protected $fillable = [
        'merchant_id', 
        'vendor_id', 
        'shopify_order_id', 
        'total_price'
    ];

    public function merchant()
    {
        return $this->belongsTo(Merchant::class);
    }

    public function vendor()
    {
        return $this->belongsTo(Vendor::class);
    }

    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }
}
