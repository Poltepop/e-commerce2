<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProductsInventories extends Model
{
    public $fillable = [
        'qty'
    ];

    public function product():BelongsTo
    {
        return $this->belongsTo(Product::class, 'product_id','id');
    }
}
