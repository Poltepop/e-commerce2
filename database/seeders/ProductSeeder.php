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
        $products = [
            [
                'name' => 'Superstar Jumbo',
                'slug' => 'superstar-jumbo',
                'price' => 100000.00,
                'weight' => 100.000,
                'short_description' => 'short description 1',
                'description' => 'description 1',
                'status' => 'new'
            ],
            [
                'name' => 'Mega Blast',
                'slug' => 'mega-blast',
                'price' => 150000.00,
                'weight' => 120.000,
                'short_description' => 'short description 2',
                'description' => 'description 2',
                'status' => 'new'
            ],
            [
                'name' => 'Ultra Pro',
                'slug' => 'ultra-pro',
                'price' => 120000.00,
                'weight' => 110.000,
                'short_description' => 'short description 3',
                'description' => 'description 3',
                'status' => 'new'
            ],
            [
                'name' => 'Hyper Xtreme',
                'slug' => 'hyper-xtreme',
                'price' => 175000.00,
                'weight' => 130.000,
                'short_description' => 'short description 4',
                'description' => 'description 4',
                'status' => 'new'
            ],
            [
                'name' => 'Max Power',
                'slug' => 'max-power',
                'price' => 140000.00,
                'weight' => 105.000,
                'short_description' => 'short description 5',
                'description' => 'description 5',
                'status' => 'new'
            ],
            [
                'name' => 'Legendary Force',
                'slug' => 'legendary-force',
                'price' => 200000.00,
                'weight' => 150.000,
                'short_description' => 'short description 6',
                'description' => 'description 6',
                'status' => 'new'
            ],
            [
                'name' => 'Power Strike',
                'slug' => 'power-strike',
                'price' => 110000.00,
                'weight' => 90.000,
                'short_description' => 'short description 7',
                'description' => 'description 7',
                'status' => 'new'
            ],
            [
                'name' => 'Thunder Bolt',
                'slug' => 'thunder-bolt',
                'price' => 160000.00,
                'weight' => 125.000,
                'short_description' => 'short description 8',
                'description' => 'description 8',
                'status' => 'new'
            ],
            [
                'name' => 'Ultimate Weapon',
                'slug' => 'ultimate-weapon',
                'price' => 190000.00,
                'weight' => 140.000,
                'short_description' => 'short description 9',
                'description' => 'description 9',
                'status' => 'new'
            ],
            [
                'name' => 'Galaxy Star',
                'slug' => 'galaxy-star',
                'price' => 170000.00,
                'weight' => 115.000,
                'short_description' => 'short description 10',
                'description' => 'description 10',
                'status' => 'new'
            ],
        ];
        Product::insert($products);
    }
}
