<?php

namespace App\Services\ServiceImpl;

use App\Services\FileUploadService;
use Illuminate\Support\Facades\Storage;

class FileUploadServiceImpl implements FileUploadService {
    public function storeMultipleImage(array $images, string $path, $productId): array
    {
        $result = [];

        if (!Storage::exists($path)) {
            Storage::makeDirectory($path);
        }

        foreach ($images as $image) {
            $storePath = $image->store($path, 'public');
            if ($storePath) {
                $result[] = ['path' => $storePath, 'product_id' => $productId];
            }
        }

        return $result;
    }

    public function deleteMultipleImage(array $imagesPath): void
    {
        $data = collect($imagesPath)->pluck('path')->toArray();
        Storage::delete($data);
    }
}
