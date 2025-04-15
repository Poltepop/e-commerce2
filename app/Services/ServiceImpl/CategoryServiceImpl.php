<?php

namespace App\Services\ServiceImpl;

use App\Models\Category;
use App\Services\CategoryService;

class CategoryServiceImpl implements CategoryService {
    public function create(array $category){
        $exists = Category::where('name', $category['name'])->exists();
        if(!$exists){
            return Category::create($category);
        }
    }

    public function delete(int $id){
        $Category = Category::find($id);
        $Category->products()->detach();
        $Category->delete();
    }

    public function update(array $categories, string $slug){
        $exists = Category::where($categories['name'])->exists();
        if(!$exists){
            $category = Category::where('slug', $slug)->first();
            $category->update($categories);
        }
    }
}