<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Database\Factories\PreguntaFactory;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{

    public function run(): void
    {
        //PreguntaFactory::factory()->count(10)->create(); En caso de datos aleatorios (10), crear el factory
        $this->call([
            PreguntasSeeder::class,
        ]);
    }
}
