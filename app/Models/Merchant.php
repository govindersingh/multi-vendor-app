<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Merchant extends Model
{
    protected $fillable = ['user_id', 'business_name', 'shop_id'];
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function shops()
    {
        return $this->hasMany(Shop::class);
    }

    public function vendors()
    {
        return $this->hasMany(Vendor::class);
    }
}
