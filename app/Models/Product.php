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
}
