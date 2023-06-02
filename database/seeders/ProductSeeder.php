<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Product::create([
            'name' => 'Nike 95',
            'description' => 'Nike 95 Air with extra comfort',
            'price' => 99,
        ]);
        Product::create([
            'name' => 'Nike 97',
            'description' => 'Nike 97 Air with extra comfort',
            'price' => 129,
        ]);
        Product::create([
            'name' => 'Nike Zoom',
            'description' => 'Nike Zoom Air with extra comfort',
            'price' => 79,
        ]);
        for ($i=1; $i < 10; $i++) {
            if ($i % 3 == 0) {
                Product::create([
                    'name' => 'Reebok Model ' . $i,
                    'description' => 'Reebok model ' . $i . ' with extra comfort',
                    'price' => $i + 79,
                ]);
            } else if ($i % 2 == 0) {
                Product::create([
                    'name' => 'Adidas Model ' . $i,
                    'description' => 'Adidas model ' . $i . ' with extra comfort',
                    'price' => $i + 119,
                ]);
            } else {
                Product::create([
                    'name' => 'New Balance Model ' . $i,
                    'description' => 'New Balance model ' . $i . ' with extra comfort',
                    'price' => $i + 99,
                ]);
            }
        }
    }
}
