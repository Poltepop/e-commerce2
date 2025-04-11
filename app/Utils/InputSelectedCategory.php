<?php

namespace App\Utils;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Str;

trait InputSelectedCategory {

    /**
     * Format of selectedCategory
     * @var array<int, array{id: int, name: string}>
     */
    public array $selectedCategory = [];
    public string $inputCategory = '';
    /**
     * Format of selectedCategory
     * @var array<int, array{id: int, name: string}>
     */
    public array $categories = [];
    public function updatedInputCategory($value): void
    {
        if(!empty(trim($this->inputCategory))) {
            $result = Category::select(['id', 'name'])
                    ->where('name', 'LIKE', '%'. trim($value) .'%')
                    ->get()
                    ->toArray();

            $this->categories = $result;
        }
    }

    public function setSelectedCategory(?int $productId = null, ?string $slug = null): void
    {
        $categoryIds = Product::select('id')
                    ->where('id', $productId)
                    ->orWhere('slug', $slug)
                    ->first()
                    ->getCategoryIds();
        $result = Category::select(['id', 'name'])
                            ->whereIn('id', $categoryIds)
                            ->get()
                            ->toArray();
        $this->selectedCategory = $result;
    }
}
