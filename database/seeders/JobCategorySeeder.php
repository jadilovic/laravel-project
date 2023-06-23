<?php

namespace Database\Seeders;

use App\Models\JobCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JobCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        JobCategory::create([
            'naziv' => 'IT'
        ]);

        JobCategory::create([
            'naziv' => 'Finances'
        ]);

        JobCategory::create([
            'naziv' => 'Construction'
        ]);
    }
}
