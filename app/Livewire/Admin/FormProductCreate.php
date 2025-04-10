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
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\Title;
use Livewire\WithFileUploads;

class FormProductCreate extends Component
{
    use GenerateSlug, WithFileUploads, InputSelectedCategory, HandleFileUpload;
    public ProductRequest $productRequest;

    public function mount(): void
    {

    }

    public function updatedProductRequestName($value): void
    {
        $this->productRequest->slug = $this->generateProductSlug($value)->getSlug();
    }
    public function create(ProductService $service): void
    {
        try {
            $this->productRequest->category = $this->selectedCategory;
            $this->productRequest->store($service);
        } catch (QueryException $exception) {
            $this->addError('name', $exception->getMessage());
        }
    }

    public function delete(int $productId, ProductService $service): void
    {
        $this->productRequest->delete($productId, $service);
    }
    
    #[Title('form-products-create')]
    public function render()
    {
        return view('livewire.admin.form-product-create');
    }
}
