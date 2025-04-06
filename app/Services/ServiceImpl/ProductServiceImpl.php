<?php

namespace App\Services\ServiceImpl;

use App\Services\ProductService;
use App\Livewire\Forms\ProductRequest;
use App\Models\Product;

class ProductServiceImpl implements ProductService {
    public function create(Product $product): void {
        $product->status = empty(trim($product->status)) ? 'new' : $product->status;
        $product->save();
    }

    public function delete(int $productId): void
    {
        $isExist = Product::select('id')->find($productId);
        if ($isExist !== null) {
            $isExist->delete();
        }
    }
}
