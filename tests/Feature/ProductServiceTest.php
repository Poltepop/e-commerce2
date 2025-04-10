<?php

namespace Tests\Feature;

use App\Livewire\Admin\ProductPage;
use App\Livewire\Forms\ProductRequest;
use App\Models\Product;
use App\Services\FileUploadService;
use App\Services\ProductService;
use App\Services\ServiceImpl\FileUploadServiceImpl;
use Database\Seeders\ProductSeeder;
use Faker\Core\File;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Mockery;
use Mockery\MockInterface;
use Tests\TestCase;

class ProductServiceTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     */
    public function testCreateProduct(): void
    {
        $mock = Mockery::mock(FileUploadServiceImpl::class);
        $mock->shouldReceive('uploadMultipleImage')
                ->with([[]], 'products')
                ->once()
                ->andReturn([
                    ['path' => 'products/sample1.jpg'],
                    ['path' => 'products/sample2.jpg'],
                ]);

        $this->instance(FileUploadService::class, $mock);
        $productService = $this->app->make(ProductService::class);

        $productService->create();

        $this->assertTrue(true);
    }

    public function testDeleteProduct(): void
    {
        $this->seed(ProductSeeder::class);
        $productService = app(ProductService::class);
        $product = Product::select(['id', 'name', 'slug'])->where('slug', 'superstar-jumbo')->first();
        self::assertNotNull($product);

        $productService->delete($product->id);
        $result = Product::select('id')->where('slug', 'superstar-jumbo')->first();
        self::assertNull($result);
    }

    public function testUpdateProduct(): void
    {
        $this->seed(ProductSeeder::class);
        $productService = app(ProductService::class);
        $product = new Product();
        $product->name = 'Laptop Gaming';
        $product->slug = 'Laptop-Gaming';
        $product->price = '200.000';
        $product->weight = '2';
        $product->short_description = 'Laptop kenceng';
        $product->description = 'Laptop gaming terbaru';
        $product->status = 'dalivered';

        $productService->update(2, $product);

        $slugUpdated = Product::select('slug')->where('slug', 'Laptop-Gaming')->first();
        self::assertSame($product->slug, $slugUpdated->slug);
    }
}
