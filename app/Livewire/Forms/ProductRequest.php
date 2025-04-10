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
    public ?string $status = null;
    public bool $isVisble = false;

    #[Validate(rule:[
        'images' => ['required', 'min:1', 'max:3'],
        'images.*' => ['nullable', 'image'],
    ])]
    public array $images = [];
    public array $category = [];


    public function setProduct(): Product
    {
        $product = new Product();
        $product->name = $this->name;
        $product->slug = $this->slug;
        $product->price = $this->price;
        $product->weight = $this->weight;
        $product->short_description = $this->short_description;
        $product->description = $this->description;
        $product->status = $this->isVisble ? 'visible' : 'new';

        return $product;
    }

    public function store(ProductService $productService)
    {
        $this->validate([
            'name' => ['required', 'string', 'min:5', 'max:100', 'unique:products,name'],
            'price' => ['required', 'min:0'],
            'weight' => ['nullable',],
            'short_description' => ['nullable', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'category' => ['required', 'array', 'min:1', 'max:5'],
            'category.*.id' => ['required'],
            'category.*.name' => ['required', 'string', 'max:100'],
        ]);

        $product = $this->setProduct();

        $productService->create($product, $this->category);
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
            'name.unique' => 'Product Already Exists',
        ];
    }
}
