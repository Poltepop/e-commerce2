<?php

namespace App\Services;

use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;

interface FileUploadService {
    /**
     * @param array<int,TemporaryUploadedFile> $images
     * @return array<array{path: string, product_id: int}> number of path images that success stored
     */
    public function storeMultipleImage(array $images, string $path, int $productId): array;
    /**
     * @param array<int, array{path: string}> $imagesPath
     * @return void
     */
    public function deleteMultipleImage(array $imagesPath): void;
}
