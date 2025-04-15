<?php

namespace App\Livewire\Admin;

use App\Livewire\Forms\CategoryRequest;
use App\Models\Category;
use App\Services\CategoryService;
use App\Utils\SearchCategory;
use Livewire\Component;

class CategoryPage extends Component
{
    use SearchCategory;

    public CategoryRequest $categoryRequest;

    public function readCategories(){
        $categories = Category::select(['id','name','slug'])->get();

        $result = empty(trim($this->searchUser)) ?  $categories : $this->getSearchResult()->get();
        return $result;
    }

    public function delete(int $id,CategoryService $categoryService){
        $this->categoryRequest->delete($id, $categoryService);
    }

    public function render()
    {
        return view('livewire.admin.category-page',[
           'categories' => $this->readCategories(), 
        ]);
    }
}
