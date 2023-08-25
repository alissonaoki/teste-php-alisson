<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    // Método para efetuar o login de gerentes
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'senha' => 'required',
        ]);

        if (Auth::attempt(['email' => $request->email, 'password' => $request->senha])) {
            $user = Auth::user();

            // Verifica se o usuário é um gerente (nível 1 ou 2)
            if ($user->nivel === 1 || $user->nivel === 2) {
                $token = $user->createToken('Gerente')->accessToken;

                return response()->json(['token' => $token, 'user' => $user], 200);
            } else {
                Auth::logout();
                return response()->json(['message' => 'Apenas gerentes podem efetuar login'], 403);
            }
        } else {
            throw ValidationException::withMessages([
                'email' => ['As credenciais fornecidas são inválidas.'],
            ]);
        }
    }
}
