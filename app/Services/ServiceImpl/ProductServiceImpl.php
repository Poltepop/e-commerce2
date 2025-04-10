<?php

namespace App\Services\ServiceImpl;

use App\Services\ProductService;
use App\Livewire\Forms\ProductRequest;
use App\Models\Category;
use App\Models\Product;
use App\Utils\GenerateSlug;
use Exception;

class ProductServiceImpl implements ProductService {
    use GenerateSlug;
    public function create(Product $product, array $categories): void {
        $product->status = empty(trim($product->status)) ? 'new' : $product->status;
        $product->slug = $this->generateProductSlug($product->name)->getSlug();

        $newProduct = Product::create([
            'name' => $product->name,
            'price' => $product->price,
            'weight' => $product->weight,
            'short_description' => $product->short_description,
            'description' => $product->description,
            'slug' => $product->slug,
            'status' => $product->status,
        ]);

        $filteredCategory = collect($categories)->pluck('content')->toArray();

        $categoryIds = Category::select('id')->whereIn('name', $filteredCategory)
                                ->get()
                                ->pluck('id')
                                ->toArray();
        $newProduct->categories()->syncWithoutDetaching($categoryIds);
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

    public function createPoductCategory(array $array): void
    {

    }
}
