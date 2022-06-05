<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderSummary extends Model
{
    use HasFactory;




    /*
    |--------------------------------------------------------------------------
    |                         RELATION WITH BILLING DETAILS
    |--------------------------------------------------------------------------
    */
    public function billing_detail()
    {
        return $this->hasOne(BillingDetail::class);
    }




    /*
    |--------------------------------------------------------------------------
    |                         RELATION WITH BILLING DETAILS
    |--------------------------------------------------------------------------
    */
    public function order_detail()
    {
        return $this->hasMany(OrderDetail::class);
    }
}
