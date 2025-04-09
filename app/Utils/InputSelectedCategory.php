<?php

namespace App\Utils;

use App\Models\Product;
use Illuminate\Support\Str;

trait InputSelectedCategory {
    public array $selectedCategory = [];
    public string $inputCategory = '';
    public array $categories = [];
    public function updatedInputCategory($value): void
    {
        if(!empty(trim($this->inputCategory))) {
            $result = Product::select('name')
                                ->where('name', 'LIKE', '%'. trim($value) .'%')
                                ->get('name')->pluck('name')->toArray();
            $this->categories = $result;
        } else {
            $this->categories = [];
        }
    }
}
