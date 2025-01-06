<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    protected $fillable = [
        'merchant_id', 
        'shop_name', 
        'shopify_shop_id', 
        'shop_url', 
        'shop_email', 
        'country', 
        'currency', 
        'timezone', 
        'access_token', 
        'status'
    ];

    public function merchant()
    {
        return $this->belongsTo(Merchant::class);
    }
}
