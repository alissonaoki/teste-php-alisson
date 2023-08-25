<?php

namespace App\Http\Controllers;

use App\Models\Grupo;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class GrupoController extends Controller
{
    // Método para visualizar todos os grupos
    public function index()
    {
        $grupos = Grupo::all();
        return response()->json(['grupos' => $grupos], 200);
    }

    // Método para criar um novo grupo (apenas para gerentes de nível dois)
    public function store(Request $request)
    {
        // Verifica se o usuário autenticado é um gerente de nível dois
        $user = auth()->user();
        if ($user->nivel !== 2) {
            return response()->json(['message' => 'Apenas gerentes de nível dois podem criar grupos'], 403);
        }

        $request->validate([
            'codigo_unico' => 'required|unique:grupos',
            'nome' => 'required',
        ]);

        $grupo = Grupo::create($request->all());

        return response()->json(['grupo' => $grupo], 201);
    }

    // Método para editar um grupo (apenas para gerentes de nível dois)
    public function update(Request $request, $id)
    {
        // Verifica se o usuário autenticado é um gerente de nível dois
        $user = auth()->user();
        if ($user->nivel !== 2) {
            return response()->json(['message' => 'Apenas gerentes de nível dois podem editar grupos'], 403);
        }

        $request->validate([
            'codigo_unico' => [
                'required',
                Rule::unique('grupos')->ignore($id),
            ],
            'nome' => 'required',
        ]);

        $grupo = Grupo::find($id);

        if (!$grupo) {
            return response()->json(['message' => 'Grupo não encontrado'], 404);
        }

        $grupo->update($request->all());

        return response()->json(['grupo' => $grupo], 200);
    }

    // Método para excluir um grupo (apenas para gerentes de nível dois)
    public function destroy($id)
    {
        // Verifica se o usuário autenticado é um gerente de nível dois
        $user = auth()->user();
        if ($user->nivel !== 2) {
            return response()->json(['message' => 'Apenas gerentes de nível dois podem excluir grupos'], 403);
        }

        $grupo = Grupo::find($id);

        if (!$grupo) {
            return response()->json(['message' => 'Grupo não encontrado'], 404);
        }

        $grupo->delete();

        return response()->json(['message' => 'Grupo removido com sucesso'], 200);
    }
}
