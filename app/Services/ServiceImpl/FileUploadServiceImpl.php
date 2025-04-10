<?php

namespace App\Services\ServiceImpl;

use App\Services\FileUploadService;
use Illuminate\Support\Facades\Storage;

class FileUploadServiceImpl implements FileUploadService {
    public function uploadMultipleImage(array $images, string $path): array
    {
        $result = [];

        if (!Storage::exists($path)) {
            Storage::makeDirectory($path);
        }

        foreach ($images as $image) {
            $storePath = $image->store($path, 'public');
            if ($storePath) {
                $result[] = ['path' => $storePath];
            }
        }

        return $result;
    }
}
