<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Postcode;

class City extends Model
{
    protected $guarded = [];

    protected function postcodes()
    {
        return $this->hasMany(Postcode::class);
    }
}
