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
    public array $productSelected = [];
    public array $allProductId = [];
    public bool $isSelectAll = false;

    public function mount(): void
    {
        $productid = Product::select(['id'])->get();
        foreach ($productid as $value) {
            $this->allProductId[] = $value->id;
        }
    }

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

    public function changeProductSelected(?int $id = null, bool $selectAll = false): void
    {
        if ($selectAll) {
            $this->isSelectAll = $this->isSelectAll ? false : true;
            $this->productSelected = $this->isSelectAll ? $this->allProductId : [];
        } else {
            if (in_array($id, $this->productSelected)) {
                // delete id
                $this->productSelected = array_diff($this->productSelected, [$id]);
                // reset index
                $this->productSelected = array_values($this->productSelected);
            } else {
                // add id
                $this->productSelected[] = $id; 
            }
        }
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
