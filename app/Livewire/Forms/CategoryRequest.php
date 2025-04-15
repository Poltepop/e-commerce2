<?php

namespace App\Livewire\Forms;

use App\Services\CategoryService;
use Livewire\Attributes\Validate;
use Livewire\Form;

class CategoryRequest extends Form
{
    public string $name = '';
    public string $slug = '';

    public function store(CategoryService $categoryService){
        $category = [
            'name' => $this->name,
            'slug' => $this->slug
        ];

        $categoryService->create($category);
    }

    public function delete(int $id, CategoryService $categoryService){
        $categoryService->delete($id);
    }

    public function update(CategoryService $categoryService, $oldslug){
        $category = [
            'name' => $this->name,
            'slug' => $this->slug,
        ];

        $categoryService->update($category, $oldslug);
    }

    protected function rules(): array
    {
        return [
            'name' => ['required', 'string', 'min:5', 'max:100', 'unique:categories,name'],
        ];
    }
}
