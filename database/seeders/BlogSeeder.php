<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Blog;

class BlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        // Blog::create([
        //     'naziv' => 'Prvi blog post',
        //     'opis' => 'Ovo je opis prvog blog posta'
        // ]);
        //  Blog::create([
        //     'naziv' => 'Drugi blog post',
        //     'opis' => 'Ovo je opis drugog blog posta'
        // ]);
        //  Blog::create([
        //     'naziv' => 'Treci blog post',
        //     'opis' => 'Ovo je opis treceg blog posta'
        // ]);
        //  Blog::create([
        //     'naziv' => 'Cetvrti blog post',
        //     'opis' => 'Ovo je opis cetvrtog blog posta'
        // ]);
        for ($i=0; $i < 5; $i++) {
             Blog::create([
                'naziv' => $i . ' blog post',
                'opis' => 'Ovo je opis ' . $i . ' blog posta'
            ]);
        }
    }
}
