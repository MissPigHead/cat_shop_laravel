<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Product;
use App\Models\Order;

class OrderDetail extends Model
{
    protected $guarded = [];

    public function products()
    {
        return $this->belongsToMany(Product::class);
    }

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function getProductNameAttribute()
    {
        return $this->attributes['product_name'] = Product::find($this->product_id)->name;
    }
}
