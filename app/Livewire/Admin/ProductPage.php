<?php

namespace App\Livewire\Admin;

use App\Livewire\Forms\ProductRequest;
use App\Models\Product;
use App\Utils\SearchProduct;
use Livewire\Component;

class ProductPage extends Component
{
    use SearchProduct;
    public ProductRequest $productRequest;

    public function readProducts()
    {
        $product = Product::select(['id', 'name', 'price', 'weight', 'short_description', 'description', 'status', 'created_at'])
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
    public function render()
    {
        return view('livewire.admin.product-page', [
            'products' => $this->readProducts(),
            'productQty' => $this->productQuantity(),
            'avgProductPrice' => $this->avgProductPrice(),
        ]);
    }
}
