<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BillingDetail extends Model
{
    use HasFactory;




    /*
    |--------------------------------------------------------------------------
    |                         RELATION WITH ORDER SUMMARY
    |--------------------------------------------------------------------------
    */
    public function order_summary()
    {
        return $this->belongsTo(OrderSummary::class);
    }




    /*
    |--------------------------------------------------------------------------
    |                         RELATION WITH COUNTRY
    |--------------------------------------------------------------------------
    */
    public function country()
    {
        return $this->hasOne(Country::class);
    }




    /*
    |--------------------------------------------------------------------------
    |                         RELATION WITH CITY
    |--------------------------------------------------------------------------
    */
    public function city()
    {
        return $this->hasOne(City::class);
    }

}
