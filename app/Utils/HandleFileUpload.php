<?php

namespace App\Utils;

trait HandleFileUpload {
    public array $selectedImage = [];

    public function updatedProductRequestImages($value): void
    {
        count($value) < 4 ? $this->selectedImage = $value : $this->selectedImage = [];
    }

    public function deleteImageSelected($index){
        $data = $this->selectedImage;
        unset($data[$index]);
        $data = array_values($data);
        $this->selectedImage = $data;
    }

    public function resetImages(): void
    {
        $this->productRequest->images = [];
        $this->selectedImage = [];
    }
}
