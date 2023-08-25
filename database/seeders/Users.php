<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'codigo_unico' => 'U1',
            'nome' => 'Gerente 1',
            'email' => 'gerente1@example.com',
            'password' => Hash::make('password'),
            'nivel' => 1, // Nível 1 para gerente de nível um
        ]);

        User::create([
            'codigo_unico' => 'U2',
            'nome' => 'Gerente 2',
            'email' => 'gerente2@example.com',
            'password' => Hash::make('password'),
            'nivel' => 2, // Nível 2 para gerente de nível dois
        ]);
    }
}
