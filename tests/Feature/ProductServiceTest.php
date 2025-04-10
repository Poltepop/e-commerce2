<?php

namespace Tests\Feature;

use App\Livewire\Admin\ProductPage;
use App\Livewire\Forms\ProductRequest;
use App\Models\Category;
use App\Models\Product;
use App\Services\FileUploadService;
use App\Services\ProductService;
use App\Services\ServiceImpl\FileUploadServiceImpl;
use App\Services\ServiceImpl\ProductServiceImpl;
use Database\Seeders\DatabaseSeeder;
use Database\Seeders\ProductSeeder;
use Exception;
use Faker\Core\File;
use Illuminate\Container\Attributes\Database;
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
