<?php

namespace App\Services;

use App\Models\Product;
use Exception;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;

interface ProductService {
    /**
     * Summary of create
     * @param array<int, TemporaryUploadedFile> $images
     * @throws Exception failed to upload image
     */
    public function create(Product $product, array $categories, array $images): void;
    public function update(int $productId, Product $product): void;
    public function delete(int $productId): void;
    public function createPoductCategory(array $array): void;
}
