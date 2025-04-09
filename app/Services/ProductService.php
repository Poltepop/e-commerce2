<?php

namespace App\Services;

use App\Models\Product;

interface ProductService {
    public function create(Product $product, array $categories): void;
    public function update(int $productId, Product $product): void;
    public function delete(int $productId): void;
    public function createPoductCategory(array $array): void;
}
