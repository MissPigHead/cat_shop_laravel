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

    public function getParentCategoryNameAttribute()
    {
        $p_id=Category::find($this->category_id)->parent;
        $p_name=Category::find($p_id)->name;
        return $this->attributes['parent_category_name'] = $p_name;
    }
    public function getCategoryNameAttribute()
    {
        return $this->attributes['category_name'] = Category::find($this->category_id)->name;
    }
    public function order_details()
    {
        return $this->belongsToMany(OrderDetail::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
