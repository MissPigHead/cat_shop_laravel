<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\City;
use App\Models\Recipient;

class Postcode extends Model
{
    protected $guarded = [];

    public function city()
    {
        return $this->belongsTo(City::class);
    }
    public function recipients()
    {
        return $this->hasMany(Recipient::class);
    }

    public function getCityNameAttribute()
    {
        return $this->attributes['city_name'] = City::find($this->city_id)->city_name;
    }
}
