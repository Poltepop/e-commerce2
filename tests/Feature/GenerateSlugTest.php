<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Product;
use App\Utils\GenerateSlug;
use Database\Seeders\ProductSeeder;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class GenerateSlugTest extends TestCase
{
    use GenerateSlug, RefreshDatabase;
    /**
     * A basic feature test example.
     */
    public function testGenerateProductSlug(): void
    {
        $this->seed(ProductSeeder::class);
        $result = $this->generateProductSlug('Sample Word')->getSlug();
        var_dump($result);
        self::assertSame('sample-word', $result);
    }

    public function testMustGenerateUniqueProductSlug(): void
    {
        $this->seed(ProductSeeder::class);
        $result = $this->generateProductSlug('Superstar Jumbo')->getSlug();
        var_dump($result);
        self::assertNotSame('superstar-jumbo', $result);
    }
}
