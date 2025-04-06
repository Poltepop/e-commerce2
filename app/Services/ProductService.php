<?php

namespace App\Services;

use App\Models\Product;

interface ProductService {
    public function create(Product $product): void;
    public function delete(int $productId): void;
}
