<?php

namespace App\Services\ServiceImpl;

use App\Services\ProductService;
use App\Livewire\Forms\ProductRequest;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductImages;
use App\Services\FileUploadService;
use App\Utils\GenerateSlug;
use Exception;

class ProductServiceImpl implements ProductService {
    use GenerateSlug;

    public function __construct(
        private FileUploadService $fileUploadService
    ){}

    public function create(Product $product, array $categories, array $images): void
    {
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

        $this->saveProductImages($images, $newProduct->id);

        $categoryIds = array_values(
            collect($categories)->pluck('id')->toArray()
        );

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
        $product = Product::select('id')->find($productId);
        if ($product !== null) {
            $imagesProduct = $product->productImages()->select('path');

            $imagePaths = $imagesProduct->get()->toArray();

            $this->fileUploadService->deleteMultipleImage($imagePaths);

            $totalDelete = $imagesProduct->delete();

            if ($totalDelete === 0) throw new Exception('delete fail');

            $totalDelete = $product->categories()->detach();

            if ($totalDelete === 0) throw new Exception('delete fail');

            $totalDelete = $product->delete();
            if ($totalDelete === 0) throw new Exception('delete fail');
        }
    }

    public function createPoductCategories(array $categories): bool
    {
        return Category::insert($categories);
    }

    public function saveProductImages(array $images, int $productId): void
    {
        try {
            $imagePaths = $this->fileUploadService->storeMultipleImage($images, 'products', $productId);

            if (count($imagePaths) < count($images)) throw new Exception("Failed to store image");

            $isSuccess = ProductImages::insert($imagePaths);

            if (!$isSuccess) throw new Exception('Failed to store image');

        } catch (Exception $exception) {
            $this->fileUploadService->deleteMultipleImage($imagePaths);
            throw new Exception($exception->getMessage());
        }
    }
}
