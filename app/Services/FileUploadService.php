<?php

namespace App\Services;

interface FileUploadService {
    /**
     * images
     * @param array<int,\Livewire\Features\SupportFileUploads\TemporaryUploadedFile> $images
     * @return array<array{path: string}> number of path images
     */
    public function uploadMultipleImage(array $images, string $path): array;
}
