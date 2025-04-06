<?php

namespace App\Livewire\Forms;

use App\Models\Product;
use App\Services\ProductService;
use Livewire\Attributes\Validate;
use Livewire\Form;

class ProductRequest extends Form
{
    public ?Product $product = null;

    public function store(ProductService $productService)
    {
        $this->validate([
            'product.name' => ['required', 'string', 'min:5', 'max:100'],
            'product.price' => ['required', 'min:0', 'decimal:2'],
            'product.weight' => ['required', 'decimal:3'],
            'product.short_description' => ['nullable', 'string', 'max:255'],
            'product.description' => ['nullable', 'string'],
        ]);

        $productService->create($this->product);
    }
}
