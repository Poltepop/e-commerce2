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
    /**
     * Summary of update
     * @param int $productId
     * @param array<int, TemporaryUploadedFile> $images
     */
    public function update(int $productId, Product $product, array $categories, array $images): void;
    public function delete(int $productId): void;
    /**
     * @param array<int, TemporaryUploadedFile> $images
     * @throws Exception
     * @return void
     */
    public function saveProductImages(array $images, int $productId): void;
    /**
     * @param array<int, TemporaryUploadedFile> $newImage
     * @throws Exception
     * @return void
     */
    public function updateProductImages(Product $productFoundById, array $newImages): void;
}
