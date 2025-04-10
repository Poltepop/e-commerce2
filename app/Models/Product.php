<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

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

    public function categories():BelongsToMany
    {
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

    public function productImages():HasMany
    {
        return $this->hasMany(ProductImages::class, 'products_id', 'id');
    }
}
