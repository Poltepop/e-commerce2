<?php

namespace App\Livewire\Admin;

use App\Livewire\Forms\ProductRequest;
use App\Models\Product;
use App\Services\ProductService;
use App\Utils\HandleFileUpload;
use App\Utils\InputSelectedCategory;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithFileUploads;

class FormProductUpdate extends Component
{
    use WithFileUploads, InputSelectedCategory, HandleFileUpload;
    public ProductRequest $productRequest;

    public function mount($slug): void
    {
        $products = Product::select(['name','slug','price','weight','short_description','description','status'])
                                ->where('slug',$slug)
                                ->first();

        $this->setSelectedCategory(slug: $slug);

        $this->productRequest->fill(
            $products->only('name','slug','price','weight','short_description','description','status'),
        );
    }

    public function update(ProductService $productService): void
    {
        $this->productRequest->update( $productService);
    }

    #[Title('form-products-update')]
    public function render()
    {
        return view('livewire.admin.form-product-update');
    }
}
