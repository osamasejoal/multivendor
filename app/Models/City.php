<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;

    public function relationToCountry()
    {
        return $this->hasOne(Country::class, 'id', 'country_id');
    }
}
