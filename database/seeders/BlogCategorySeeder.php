<?php

namespace Database\Seeders;

use App\Models\BlogCategory;
use Illuminate\Database\Seeder;



class BlogCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        BlogCategory::create([
            'naziv' => 'Sport'
        ]);
         BlogCategory::create([
            'naziv' => 'Tehnologija'
        ]);
         BlogCategory::create([
            'naziv' => 'Vijesti'
        ]);
    }
}
