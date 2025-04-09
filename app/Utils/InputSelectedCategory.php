<?php

namespace App\Utils;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Str;

trait InputSelectedCategory {
    public array $selectedCategory = [];
    public string $inputCategory = '';
    public array $categories = [];
    public function updatedInputCategory($value): void
    {
        if(!empty(trim($this->inputCategory))) {
            $result = Category::select(['id', 'name'])
                    ->where('name', 'LIKE', '%'. trim($value) .'%')
                    ->get()
                    ->toArray();

            $this->categories = $result;
            // dd($result);
        }
    }
}
