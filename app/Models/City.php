<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\PostCode;

class City extends Model
{
    protected $guarded = [];

    protected function zip_codes()
    {
        return $this->hasMany(PostCode::class);
    }
}
