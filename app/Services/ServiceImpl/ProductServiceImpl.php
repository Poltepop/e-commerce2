<?php

namespace App\Services\ServiceImpl;

use App\Services\ProductService;
use App\Livewire\Forms\ProductRequest;
use App\Models\Product;

class ProductServiceImpl implements ProductService {
    public function create(ProductRequest $product): void {
        $product->status = empty(trim($product->status)) ? 'new' : $product->status;

        Product::create([
            'name' => $product->name,
            'price' => $product->price,
            'weight' => $product->weight,
            'slug' => $product->name,
            'short_description' => $product->short_description,
            'description' => $product->description,
            'status' => $product->status,
        ]);
    }

    public function delete(int $productId): void
    {
        $isExist = Product::select('id')->find($productId);
        if ($isExist !== null) {
            $isExist->delete();
        }
    }
}
