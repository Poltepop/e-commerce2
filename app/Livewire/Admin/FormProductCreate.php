<?php

namespace App\Livewire\Admin;

use App\Models\Product;
use Livewire\Component;
use App\Services\ProductService;
use App\Livewire\Forms\ProductRequest;

class FormProductCreate extends Component
{
    public ProductRequest $productRequest;
    
    public function mount(): void
    {
        $this->productRequest->status = 'new';
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
