<?php

namespace App\Livewire\Admin;

use App\Livewire\Forms\CategoryRequest;
use App\Services\CategoryService;
use App\Utils\GenerateSlug;
use Illuminate\Database\QueryException;
use Livewire\Component;

class FormCategoryCreate extends Component
{
    use GenerateSlug;
    public CategoryRequest $categoryRequest;


    public function updatedCategoryRequestName($value){
        $this->categoryRequest->slug = $this->generateCategorySlug($value)->getSlug() ?? '';
    }
    public function create(CategoryService $service){
        $this->validate();
        
        try {
            $this->categoryRequest->store($service);
            notify()->success('success create category ' . $this->categoryRequest->name);
            return response()->redirectToRoute('admin.categories');
        }catch(QueryException $exception){
            $this->addError('categoryRequest.name', $exception->getMessage());
        }
    }

    public function render()
    {
        return view('livewire.admin.form-category-create');
    }
}
