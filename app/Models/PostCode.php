<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\City;

class PostCode extends Model
{
    protected $guarded = [];

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function getCityNameAttribute()
    {
        return $this->attributes['city_name'] = City::find($this->city_id)->city_name;
    }
}
