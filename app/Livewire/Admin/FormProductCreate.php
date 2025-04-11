<?php

namespace App\Livewire\Admin;

use App\Models\Product;
use App\Utils\GenerateSlug;
use Exception;
use Illuminate\Validation\ValidationException;
use Livewire\Component;
use App\Services\ProductService;
use App\Livewire\Forms\ProductRequest;
use App\Models\Category;
use App\Utils\HandleFileUpload;
use App\Utils\InputSelectedCategory;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Testing\Fakes\Fake;
use Livewire\Attributes\Title;
use Livewire\WithFileUploads;

class FormProductCreate extends Component
{
    use GenerateSlug, WithFileUploads, InputSelectedCategory, HandleFileUpload;
    public ProductRequest $productRequest;

    public function mount(): void
    {
        $this->productRequest->name = fake()->sentence();
        $this->productRequest->description = "jawa anj";
        $this->productRequest->short_description = "palembang rakus";
        $this->productRequest->price = 1000.00;
        $this->productRequest->weight = 100.000;
        $this->productRequest->stock = 50;
    }

    public function updatedProductRequestName($value): void
    {
        $this->productRequest->slug = $this->generateProductSlug($value)->getSlug();
    }
    public function create(ProductService $service): void
    {
        $this->validate();
        try {
            $this->productRequest->category = $this->selectedCategory;
            $this->productRequest->store($service);
        } catch (QueryException|Exception $exception) {
            $this->addError('productRequest.name', $exception->getMessage());
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
