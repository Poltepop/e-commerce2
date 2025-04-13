<?php

namespace App\Livewire\Admin;

use App\Livewire\Forms\ProductRequest;
use App\Models\Product;
use App\Services\ProductService;
use App\Utils\SearchProduct;
use Exception;
use Illuminate\Foundation\ViteManifestNotFoundException;
use Livewire\Attributes\Title;
use Livewire\Component;

class ProductPage extends Component
{
    use SearchProduct;
    public ProductRequest $productRequest;
    public array $productSelected = [];

    public function mount(): void
    {

    }

    public function deleteOne(ProductService $productService, int $productid): void
    {
        try {
            $productService->delete($productid);
        } catch (Exception $exception) {
            //throw $th;
        }
    }

    public function deleteManyProduct(array $productIds): void
    {
        dd($productIds);
    }

    public function setSelectedProduct(array $productSelected): void
    {
        $this->productSelected = $productSelected;
    }

    public function readProducts()
    {
        $product = Product::select(['id','slug', 'name', 'price', 'weight', 'short_description', 'description', 'status', 'created_at'])
                            ->get();
        $result = empty(trim($this->searchUser)) ? $product : $this->getSearchResult()->get();
        return $result;
    }

    public function productQuantity(): int
    {
        return Product::select('id')->get()->count();
    }

    public function avgProductPrice()
    {
        return Product::select('price')->get()->avg('price');
    }


    #[Title('products')]
    public function render()
    {
        return view('livewire.admin.product-page', [
            'products' => $this->readProducts(),
            'productQty' => $this->productQuantity(),
            'avgProductPrice' => $this->avgProductPrice(),
        ]);
    }
}
