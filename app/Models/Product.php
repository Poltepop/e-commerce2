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

    public function getCategoryIds(): array
    {
        return $this->belongsToMany(
                        Category::class,
                        'product_categories',
                        'product_id',
                        'category_id')
                        ->select(['category_id'])
                        ->get()
                        ->pluck('category_id')
                        ->toArray();
    }
}
