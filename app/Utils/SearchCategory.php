<?php

namespace App\Utils;

use App\Models\Category;

trait SearchCategory {
    public string $searchUser = '';

    public function getSearchResult()
    {
        $result = Category::select(['id','name','slug'])->where('name', 'LIKE', '%' . $this->searchUser . '%');

        return $result;
    }
}