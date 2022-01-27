<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SubCategory extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded = [];

    public function relationToCategory(){
        return $this->hasOne(Category::class, 'id', 'category_id');
    }
}
