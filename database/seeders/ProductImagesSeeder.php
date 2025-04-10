<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ProductImagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Factory::create();
        $products = Product::pluck('id', 'name'); 
    
        foreach (range(1, 10) as $index) {
            $productName = $faker->randomElement($products->keys()->toArray());
            $productId = $products[$productName]; 
    
            $filename = Str::slug(strtolower($productName)) . '.jpeg';
    
            DB::table('product_images')->insert([
                'product_id' => $productId,
                'path' => 'dummy/' . $filename,
            ]);
        }
    }
}
