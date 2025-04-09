<?php

namespace App\Livewire\Forms;

use App\Models\Product;
use App\Services\ProductService;
use Livewire\Attributes\Validate;
use Livewire\Form;
use Livewire\WithFileUploads;

class ProductRequest extends Form
{
    public string $name = '';
    public string $slug = '';
    public string $price = '0';
    public string $weight = '';
    public ?string $short_description = null;
    public ?string $description = null;
    public string $status = '';
    #[Validate(rule: 'max:3')]
    public $images;


    public function setProduct(): Product
    {
        $product = new Product();
        $product->name = $this->name;
        $product->slug = $this->slug;
        $product->price = $this->price;
        $product->weight = $this->weight;
        $product->short_description = $this->short_description;
        $product->description = $this->description;
        $product->status = $this->status;

        return $product;
    }

    public function store(ProductService $productService)
    {
        $this->validate([
            'name' => ['required', 'string', 'min:5', 'max:100'],
            'price' => ['nullable', 'min:0'],
            'weight' => ['nullable',],
            'short_description' => ['nullable', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'images' => ['nullable', 'max:3'],
            'images.*' => ['nullable', 'image'],
        ]);


        $product = $this->setProduct();

        $productService->create($product);
    }

    public function update(ProductService $productService): void
    {
        $this->validate([
            'name' => ['required', 'string', 'min:5', 'max:100'],
            'price' => ['nullable', 'min:0'],
            'weight' => ['nullable',],
            'short_description' => ['nullable', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'images' => ['nullable', 'max:3'],
            'images.*' => ['nullable', 'image'],
        ]);

        $product = $this->setProduct();
    }

    public function delete(int $productId, ProductService $productService): void
    {
        $productService->delete($productId);
    }

    protected function messages(): array
    {
        return [
            'images.max' => 'Cant Upload More Than 3 Images',
        ];
    }
}
