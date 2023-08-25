<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Grupo;

class GrupoSeeder extends Seeder
{
    public function run()
    {
        Grupo::create([
            'codigo_unico' => 'G1',
            'nome' => 'Grupo A',
        ]);

        Grupo::create([
            'codigo_unico' => 'G2',
            'nome' => 'Grupo B',
        ]);
    }
}
