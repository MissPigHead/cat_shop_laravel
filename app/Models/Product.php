<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\OrderDetail;
use App\Models\Category;

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

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
