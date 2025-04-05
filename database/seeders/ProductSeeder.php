<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::create([
            'name' => 'Superstar Jumbo',
            'slug' => 'superstar-jumbo',
            'price' => 100000.00,
            'weight' => 100.000,
            'short_description' => 'short description',
            'description' => 'description',
            'status' => 'new'
        ]);
    }
}
