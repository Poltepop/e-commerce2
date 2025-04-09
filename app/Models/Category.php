<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'name',
        'slug',
    ];

    public function products(){
        return $this->belongsToMany(Product::class, 'product_categories', 'category_id', 'product_id');
    }
}
