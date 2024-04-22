<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Pregunta;
class PreguntasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Pregunta::created([
            'pregunta' => 'Comida Favorita',
            'estado' => 1
        ]);

        Pregunta::created([
            'pregunta' => 'Artista Favorito',
            'estado' => 1
        ]);

        Pregunta::created([
            'pregunta' => 'Lugar Favorito',
            'estado' => 1
        ]);

        Pregunta::created([
            'pregunta' => 'Color Favorito',
            'estado' => 1
        ]);
    }
}
