<?php

namespace App\Services\ServiceImpl;

use App\Services\ProductService;
use App\Livewire\Forms\ProductRequest;
use App\Models\Product;

class ProductServiceImpl implements ProductService {
    public function create(Product $product): void {
        dd($product);
        $product->status = empty(trim($product->status)) ? 'new' : $product->status;
        $product->save();
    }

    public function update(int $productId, Product $product): void
    {
        $productUpdate = Product::find($productId);
        $productUpdate->update([
            'name' => $product->name,
            'slug' => $product->name,
            'price' => $product->price,
            'weight' => $product->weight,
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
