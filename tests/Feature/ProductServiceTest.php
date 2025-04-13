<?php

namespace Tests\Feature;

use App\Livewire\Admin\ProductPage;
use App\Livewire\Forms\ProductRequest;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductImages;
use App\Services\FileUploadService;
use App\Services\ProductService;
use App\Services\ServiceImpl\FileUploadServiceImpl;
use App\Services\ServiceImpl\ProductServiceImpl;
use Database\Seeders\DatabaseSeeder;
use Database\Seeders\ProductSeeder;
use Exception;
use Faker\Core\File;
use Illuminate\Container\Attributes\Database;
use Illuminate\Foundation\Testing\DatabaseTransactions;
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
    public function test_success_create_product(): void
    {
        $this->seed(DatabaseSeeder::class);
        $product = new Product();
        $product->name = "jajan makan";
        $product->price = 100.000;
        $product->weight = 100.000;
        $product->short_description = "jajan product";
        $product->description = "joko tingkir";
        $product->status = "new";

        $categories = Category::select(['id', 'name'])->limit(2)->get()->toArray();

        $service = $this->instance(
            ProductService::class,
            $this->partialMock(ProductServiceImpl::class, function(MockInterface $mock){
                $mock->shouldReceive('saveProductImages')
                        ->with(['yus.jpg'], Mockery::any())
                        ->once()
                        ->andReturnNull();
            })
        );
        $service->create($product, $categories, ['yus.jpg']);

        $isExists = Product::select(['id', 'slug'])
                                ->where('slug', 'jajan-makan')->first();

        $this->assertTrue(true);
        $this->assertNotNull($isExists);
        $this->assertSame('jajan-makan', $isExists->slug);
    }

    public function test_success_delete_one_product(): void
    {
        $this->seed(DatabaseSeeder::class);
        $product = Product::select(['id'])->first();

        $product->categories()->sync([1, 2, 3, 4]);
        $product->productImages()->create(['path' => 'dummy/eko.jpg']);

        $productService = $this->app->make(ProductService::class);
        $productService->delete($product->id);

        $productDeleted = Product::select('id')->find($product->id);

        self::assertNull($productDeleted);
    }

    public function test_failed_store_images_when_create_product(): void
    {
        $this->seed(DatabaseSeeder::class);

        $this->expectException(Exception::class);
        $this->expectExceptionMessage('failed store images');

        $product = new Product();
        $product->name = "jajan makan";
        $product->price = 100.000;
        $product->weight = 100.000;
        $product->short_description = "jajan product";
        $product->description = "joko tingkir";
        $product->status = "new";

        $categories = Category::select(['id', 'name'])->limit(2)->get()->toArray();

        $service = $this->instance(
            ProductService::class,
            $this->partialMock(ProductServiceImpl::class, function(MockInterface $mock){
                $mock->shouldReceive('saveProductImages')
                        ->with(['yus.jpg'], Mockery::any())
                        ->once()
                        ->andThrow(Exception::class, 'failed store images');
            })
        );
        $service->create($product, $categories, ['yus.jpg']);
    }

    public function test_success_save_multiple_image_product(): void
    {
        $this->seed(DatabaseSeeder::class);

        $product = Product::select(['id'])->first();
        $images = ['jamal.jpg', 'eko.jpg'];

        $mock = $this->mock(
            FileUploadServiceImpl::class,
            function(MockInterface $mock) use ($images, $product) {
                $mock->shouldReceive('storeMultipleImage')
                        ->with($images, 'products', $product->id)
                        ->once()
                        ->andReturn([
                            ['path' => 'jamal.jpg', 'product_id' => $product->id],
                            ['path' => 'eko.jpg', 'product_id' => $product->id],
                        ]);
        });

        $this->app->instance(FileUploadService::class, $mock);
        $productService = $this->app->make(ProductService::class);
        $productService->saveProductImages($images, $product->id);


        $this->assertDatabaseHas(ProductImages::class, ['path' => $images]);
    }

    public function test_failed_upload_image(): void
    {
        $this->seed(DatabaseSeeder::class);

        $this->expectException(Exception::class);
        $this->expectExceptionMessage('Failed to store image');

        $product = Product::select(['id'])->first();
        $images = ['jamal.jpg', 'eko.jpg'];

        $mock = $this->mock(
            FileUploadServiceImpl::class,
            function(MockInterface $mock) use ($images, $product) {
                $mock->shouldReceive('storeMultipleImage')
                        ->with($images, 'products', $product->id)
                        ->once()
                        ->andReturn([
                            ['path' => 'jamal.jpg', 'product_id' => $product->id],
                        ]);

                $mock->shouldReceive('deleteMultipleImage')
                        ->with([
                            ['path' => 'jamal.jpg', 'product_id' => $product->id]
                        ])
                        ->once()
                        ->andReturnNull();
        });

        $this->app->instance(FileUploadService::class, $mock);
        $productService = $this->app->make(ProductService::class);
        $productService->saveProductImages($images, $product->id);

        $this->assertDatabaseMissing(ProductImages::class, ['path' => $images]);
    }

    public function test_success_update_product_images(): void
    {
        $this->seed(DatabaseSeeder::class);
        $product = Product::select(['id', 'name'])->first();
        $product->productImages()->create(['path' => 'dummy/eko.jpg']);


        $images = ['jamal.jpg'];

        $mock = $this->mock(
            FileUploadServiceImpl::class,
            function(MockInterface $mock) use ($images, $product) {
                $mock->shouldReceive('storeMultipleImage')
                        ->with($images, 'products', $product->id)
                        ->once()
                        ->andReturn([
                            ['path' => 'jamal.jpg', 'product_id' => $product->id],
                        ]);

                $mock->shouldReceive('deleteMultipleImage')
                        ->with(Mockery::any())
                        ->once()
                        ->andReturnNull();
        });

        $this->app->instance(FileUploadService::class, $mock);
        $productService = $this->app->make(ProductService::class);

        $productService->updateProductImages($product, $images);

        self::assertTrue(true);
        self::assertDatabaseHas(ProductImages::class, ['path' => 'jamal.jpg']);
        self::assertDatabaseMissing(ProductImages::class, ['path' => 'dummy/eko.jpg']);
    }

    public function testCollection(): void
    {
        $product = collect([
            ['id' => 1, 'name' => 'jamal'],
            ['id' => 2, 'name' => 'adit'],
        ]);

        $result = $product->select('name')->toArray();

        self::assertEquals([
            ['name' => 'jamal'],
            ['name' => 'adit'],
        ], $result);

        $result = $product->pluck('name')->toArray();
        self::assertEquals(['jamal', 'adit'], $result);
    }
}
