<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Middleware\OnlyAdminMiddleware;
use App\Livewire\Admin\CategoryPage;
use App\Livewire\Admin\FormCategoryCreate;
use App\Livewire\Admin\FormCategoryUpdate;
use App\Livewire\Admin\FormProductCreate;
use App\Livewire\Admin\FormProductUpdate;
use App\Livewire\Admin\ProductPage;
use App\Livewire\User\Home;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view(view: 'welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified','OnlyAdmin'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['OnlyAdmin', 'auth'])->group(function () {
    Route::get('/admin/products', ProductPage::class)->name('admin.products');
    Route::get('/admin/products/create', FormProductCreate::class)->name('form.product.create');
    Route::get('/admin/products/{slug}/update/', FormProductUpdate::class)->name('form.product.update');

    Route::get('/admin/categories', CategoryPage::class)->name('admin.categories');
    Route::get('admin/category/create', FormCategoryCreate::class)->name('form.category.create');
    Route::get('admin/category/{slug}/update/', FormCategoryUpdate::class)->name('form.category.update');
});

Route::middleware(['auth'])->group(function(){
    Route::get('/home', Home::class)->name('home');
});

require __DIR__.'/auth.php';
