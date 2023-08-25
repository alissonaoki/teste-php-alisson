<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class RegisterController extends Controller
{
    // Método para registrar um novo gerente
    public function register(Request $request)
    {
        $request->validate([
            'codigo_unico' => 'required|unique:users',
            'nome' => 'required',
            'email' => 'required|email|unique:users',
            'senha' => 'required|min:6',
            'nivel' => ['required', Rule::in([1, 2])], // 1 para gerente de nível um, 2 para gerente de nível dois
        ]);

        $user = User::create([
            'codigo_unico' => $request->codigo_unico,
            'nome' => $request->nome,
            'email' => $request->email,
            'password' => Hash::make($request->senha),
            'nivel' => $request->nivel,
        ]);

        return response()->json(['user' => $user, 'message' => 'Gerente registrado com sucesso'], 201);
    }
}
