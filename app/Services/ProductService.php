<?php

namespace App\Services;

use App\Livewire\Forms\ProductRequest;

interface ProductService {
    public function create(ProductRequest $product): void;
}
