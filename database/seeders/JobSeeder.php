<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Job;

class JobSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Job::create([
        //     'naziv' => 'Prvi oglas za posao',
        //     'opis' => 'Ovo je opis prvog oglasa za posao'
        // ]);
        // Job::create([
        //     'naziv' => 'Drugi oglas za posao',
        //     'opis' => 'Ovo je opis drugog oglasa za posao'
        // ]);
        // Job::create([
        //     'naziv' => 'Treci oglas za posao',
        //     'opis' => 'Ovo je opis treceg oglasa za posao'
        // ]);
        for ($i=4; $i < 10; $i++) {
            Job::create([
            'naziv' => $i . '. oglas za posao',
            'opis' => 'Ovo je opis ' . $i . '. oglasa za posao'
        ]);
        }
    }
}
