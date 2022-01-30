<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wishlist extends Model
{
    use HasFactory;
    protected $table = 'wishlists';

    protected $guarded = [];

    public function relationToProduct()
    {
        return $this->hasOne(Product::class, 'id', 'product_id');
    }
}