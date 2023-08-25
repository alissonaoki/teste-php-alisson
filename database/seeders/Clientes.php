<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Cliente;

class ClienteSeeder extends Seeder
{
    public function run()
    {
        Cliente::create([
            'codigo_unico' => 'C1',
            'cnpj' => '123456789',
            'nome' => 'Cliente 1',
            'data_fundacao' => '2023-01-01',
        ]);

        Cliente::create([
            'codigo_unico' => 'C2',
            'cnpj' => '987654321',
            'nome' => 'Cliente 2',
            'data_fundacao' => '2023-02-01',
        ]);
    }
}
