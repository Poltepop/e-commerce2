<?php

namespace App\Livewire\Forms;

use App\Models\Product;
use App\Services\ProductService;
use Livewire\Attributes\Validate;
use Livewire\Form;
use Livewire\WithFileUploads;

class ProductRequest extends Form
{
    #[Validate()]
    public string $name = '';
    public string $price = '0';
    public string $weight = '';
    public ?string $short_description = null;
    public ?string $description = null;
    public string $status = '';
    #[Validate(rule: 'max:3')]
    public $images;
    public array $category = [];


    public function setProduct(): Product
    {
        $product = new Product();
        $product->name = $this->name;
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
            'name' => ['required', 'string', 'min:5', 'max:100', 'unique:products,name'],
            'price' => ['nullable', 'min:0'],
            'weight' => ['nullable',],
            'short_description' => ['nullable', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'images' => ['nullable', 'max:3'],
            'images.*' => ['nullable', 'image'],
            'category' => ['required', 'min:1', 'max:5'],
        ]);

        $product = $this->setProduct();

        $productService->create($product, $this->category);
    }

    public function update(int $productId, ProductService $productService): void
    {

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
