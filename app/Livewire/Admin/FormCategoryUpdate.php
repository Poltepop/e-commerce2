<?php

namespace App\Livewire\Admin;

use App\Livewire\Forms\CategoryRequest;
use App\Models\Category;
use App\Services\CategoryService;
use App\Utils\GenerateSlug;
use Illuminate\Database\QueryException;
use Livewire\Component;

class FormCategoryUpdate extends Component
{   
    use GenerateSlug;
    public string $frontalgaming = '';
    public CategoryRequest $categoryRequest;

    public function updatedCategoryRequestName($value){
        $this->categoryRequest->slug = $this->generateCategorySlug($value)->getSlug() ?? '';
    }
    public function mount($slug){
        $category = Category::select(['id','name','slug'])->where('slug', $slug)->first();
        $this->frontalgaming = $slug;
        $this->categoryRequest->name = $category->name;
        $this->categoryRequest->slug = $category->slug;
    }

    public function update(CategoryService $categoryService,){
        $this->validate();
        try{
            $this->categoryRequest->update($categoryService, $this->frontalgaming);
            notify()->success('success update category ' . $this->categoryRequest->name);
            return response()->redirectToRoute('admin.categories');
        }catch(QueryException $exception){
            $this->addError('categorytRequest.name', $exception->getMessage());
        }
    }

    public function render()
    {
        return view('livewire.admin.form-category-update');
    }
}
