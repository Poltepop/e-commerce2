<?php

namespace App\Providers;

use App\Services\ProductService;
use App\Services\ServiceImpl\ProductServiceImpl;
use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;

class ProductServiceProvider extends ServiceProvider implements DeferrableProvider
{
    /**
     * Register services.
     */
    public $singletons = [ProductService::class => ProductServiceImpl::class];

    public function register(): void
    {
        //
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
        return [ProductService::class];
    }
}
