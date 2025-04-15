<?php

namespace App\Services;

interface CategoryService{
    public function create(array $category);

    public function delete(int $id);

    public function update(array $categories, string $slug);
}