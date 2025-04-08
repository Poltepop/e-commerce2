<?php

namespace App\Services\ServiceImpl;

use App\Services\ProductService;
use App\Livewire\Forms\ProductRequest;
use App\Models\Product;
use App\Utils\GenerateSlug;

class ProductServiceImpl implements ProductService {
    use GenerateSlug;
    public function create(Product $product): void {
        $product->status = empty(trim($product->status)) ? 'new' : $product->status;
        $product->slug = $this->generateProductSlug($product->name)->getSlug();
        $product->save();
    }

    public function update(int $productId, Product $product): void
    {
        $productUpdate = Product::find($productId);

        if($productUpdate->exists())
            $slug = $this->generateProductSlug($product->name)->getSlug();
            $productUpdate?->update([
                'name' => $product->name,
                'slug' => $slug,
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
