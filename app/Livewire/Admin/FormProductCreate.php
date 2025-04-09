<?php

namespace App\Livewire\Admin;

use App\Models\Product;
use App\Utils\GenerateSlug;
use Exception;
use Livewire\Component;
use App\Services\ProductService;
use App\Livewire\Forms\ProductRequest;
use App\Models\Category;
use App\Utils\HandleFileUpload;
use App\Utils\InputSelectedCategory;
use Illuminate\Support\Facades\DB;
use Livewire\WithFileUploads;

class FormProductCreate extends Component
{
    use GenerateSlug, WithFileUploads, InputSelectedCategory, HandleFileUpload;
    public ProductRequest $productRequest;
    public ?string $slug = null;

    public function mount(): void
    {
        $this->productRequest->status = 'new';
    }

    public function updatedProductRequestName($value): void
    {
        $this->slug = $this->generateProductSlug($value)->getSlug();
    }
    public function create(ProductService $service): void
    {
        try {
            $this->productRequest->category = $this->selectedCategory;
            $this->productRequest->store($service);
        } catch (Exception $exception) {
            $this->addError('name', $exception->getMessage());
        }
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
