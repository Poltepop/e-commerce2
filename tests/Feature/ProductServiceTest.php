<?php

namespace Tests\Feature;

use App\Livewire\Admin\ProductPage;
use App\Livewire\Forms\ProductRequest;
use App\Models\Product;
use App\Services\ProductService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class ProductServiceTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     */
    public function testCreateProduct(): void
    {
        $productService = app(ProductService::class);
        $req = Livewire::test(ProductPage::class)->instance()->productRequest;

        $req->name = 'Laptop Gaming';
        $req->price = '200.000';
        $req->weight = '2';
        $req->short_description = 'Laptop kenceng';
        $req->description = 'Laptop gaming terbaru';
        $req->status = '';

        $productService->create($req);

        $result = Product::select(['id', 'name'])->where('name', 'Laptop Gaming')->get();

        self::assertSame(1, $result->count());
        self::assertSame('Laptop Gaming', $result[0]->name);
    }
}
