<?php

namespace App\Services;

use App\Models\Product;
use Exception;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;

interface ProductService {
    /**
     * @param array<int, TemporaryUploadedFile> $images
     * @throws Exception failed to upload image
     */
    public function create(Product $product, array $categories, array $images): void;
    public function update(int $productId, Product $product): void;
    public function delete(int $productId): void;
    /**
     * @param array<int, array{name: string}> $categories
     * @return bool
     */
    public function createPoductCategories(array $categories): bool;

    /**
     * @param array<int, TemporaryUploadedFile> $images
     * @throws Exception
     * @return void
     */
    public function saveProductImages(array $images, int $productId): void;
}
