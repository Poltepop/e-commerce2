<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'price',
        'weight',
        'short_description',
        'description',
        'status',
    ];

    public function categories(){
        return $this->belongsToMany(Category::class, 'product_categories', 'product_id', 'category_id');
    }
}
