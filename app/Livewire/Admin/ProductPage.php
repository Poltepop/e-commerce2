<?php

namespace App\Livewire\Admin;

use App\Models\Product;
use Livewire\Component;

class ProductPage extends Component
{
    public function render()
    {
        $product = Product::select(['id', 'name', 'price', 'weight', 'short_description', 'description', 'status', 'created_at'])
                            ->get();
        return view('livewire.admin.product-page', [
            'products' => $product
        ]);
    }
}
