<?php

namespace App\Providers;

use App\Services\FileUploadService;
use App\Services\ProductService;
use App\Services\ServiceImpl\FileUploadServiceImpl;
use App\Services\ServiceImpl\ProductServiceImpl;
use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;

class ProductServiceProvider extends ServiceProvider implements DeferrableProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->singleton(FileUploadService::class, FileUploadServiceImpl::class);
        $this->app->singleton(ProductService::class, function ($app) {
            return new ProductServiceImpl(
                $app->make(FileUploadService::class
            ));
        });
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }

    public function provides(): array
    {
        return [
            ProductService::class,
            FileUploadService::class,
        ];
    }
}
