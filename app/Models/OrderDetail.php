<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    use HasFactory;




    /*
    |--------------------------------------------------------------------------
    |                      RELATION WITH ORDER SUMMARY TABLE
    |--------------------------------------------------------------------------
    */
    public function order_summary()
    {
        return $this->belongsTo(OrderSummary::class);
    }




    /*
    |--------------------------------------------------------------------------
    |                      RELATION WITH PRODUCT TABLE
    |--------------------------------------------------------------------------
    */
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
