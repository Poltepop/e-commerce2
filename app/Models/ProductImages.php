<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class ProductImages extends Model
{
    protected $fillable = [
        'path'
    ];

    public function product():HasOne
    {
        return $this->hasOne(Product::class, 'products_id', 'id');
    }
}
