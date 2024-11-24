<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GenerosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('generos')->insert([
            ['nombre' => 'Ficción'],
            ['nombre' => 'No Ficción'],
            ['nombre' => 'Misterio'],
            ['nombre' => 'Ciencia Ficción'],
            ['nombre' => 'Fantasía'],
            ['nombre' => 'Biografía'],
            ['nombre' => 'Historia'],
            ['nombre' => 'Romántico'],
            ['nombre' => 'Terror'],
            ['nombre' => 'Aventura']
        ]);
        
    }
}
