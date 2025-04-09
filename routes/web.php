<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Middleware\OnlyAdminMiddleware;
use App\Livewire\Admin\FormProductCreate;
use App\Livewire\Admin\FormProductUpdate;
use App\Livewire\Admin\ProductPage;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['OnlyAdmin', 'auth'])->group(function () {
    Route::get('/admin/products', ProductPage::class)->name('admin.products');
    Route::get('/admin/products/create', FormProductCreate::class)->name('form.product.create');
    Route::get('/admin/{slug}/update/', FormProductUpdate::class)->name('form.product.update');
});

require __DIR__.'/auth.php';
