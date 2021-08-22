<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\OrderDetail;

class Product extends Model
{
    protected $guarded = [];

    protected $casts = [
        'image_path' => 'array',
    ];

    public function order_details()
    {
        return $this->belongsToMany(OrderDetail::class);
    }
}
