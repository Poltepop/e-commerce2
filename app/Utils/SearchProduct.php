<?php

namespace App\Utils;

use App\Models\Product;
use Illuminate\Contracts\Database\Eloquent\Builder;

trait SearchProduct {
    public string $searchUser = '';
    public function getSearchResult()
    {
        $result = Product::select(['id', 'name', 'slug', 'price', 'weight', 'short_description', 'description', 'status', 'created_at'])
                            ->where('name', 'LIKE', '%' . $this->searchUser . '%');

        return $result;
    }
}
