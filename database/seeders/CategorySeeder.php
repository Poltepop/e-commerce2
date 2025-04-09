<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $category = [
            [
                'name' => 'Mainan Besar',
                'slug' => 'mainan-besar'
            ],
            [
                'name' => 'Mainan Edukasi',
                'slug' => 'mainan-edukasi'
            ],
            [
                'name' => 'Boneka',
                'slug' => 'boneka'
            ],
            [
                'name' => 'Mainan Kayu',
                'slug' => 'mainan-kayu'
            ],
            [
                'name' => 'Puzzle Anak',
                'slug' => 'puzzle-anak'
            ],
            [
                'name' => 'Mainan Musik',
                'slug' => 'mainan-musik'
            ],
            [
                'name' => 'Mainan Elektronik',
                'slug' => 'mainan-elektronik'
            ],
            [
                'name' => 'Mainan Bayi',
                'slug' => 'mainan-bayi'
            ],
            [
                'name' => 'Mobil-Mobilan',
                'slug' => 'mobil-mobilan'
            ],
            [
                'name' => 'Robot dan Action Figure',
                'slug' => 'robot-dan-action-figure'
            ],
            [
                'name' => 'Mainan Tradisional',
                'slug' => 'mainan-tradisional'
            ]
        ];
        Category::insert($category);        
    }
}
