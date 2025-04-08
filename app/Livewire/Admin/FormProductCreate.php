<?php

namespace App\Livewire\Admin;

use App\Models\Product;
use App\Utils\GenerateSlug;
use Livewire\Component;
use App\Services\ProductService;
use App\Livewire\Forms\ProductRequest;
use Livewire\WithFileUploads;

class FormProductCreate extends Component
{
    use GenerateSlug, WithFileUploads;
    public ProductRequest $productRequest;
    public ?string $slug = null;
    public array $selectedImage = [];
    public function mount(): void
    {
        $this->productRequest->status = 'new';
    }

    public function updatedProductRequestName($value): void
    {
        $this->slug = $this->generateProductSlug($value)->getSlug();
    }

    public function updatedProductRequestImages($value): void
    {
        count($value) < 4 ? $this->selectedImage = $value : $this->selectedImage = [];
    }

    public function resetImages(): void
    {
        $this->productRequest->images = [];
        $this->selectedImage = [];
    }
    public function create(ProductService $service): void
    {
        $this->productRequest->store($service);
    }

    public function delete(int $productId, ProductService $service): void
    {
        $this->productRequest->delete($productId, $service);
    }
    public function render()
    {
        return view('livewire.admin.form-product-create');
    }
}
