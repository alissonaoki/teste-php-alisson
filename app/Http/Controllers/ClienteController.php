<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ClienteController extends Controller
{
    // Método para listar todos os clientes
    public function index()
    {
        $clientes = Cliente::all();
        return response()->json(['clientes' => $clientes], 200);
    }

    // Método para adicionar um novo cliente
    public function store(Request $request)
    {
        $request->validate([
            'codigo_unico' => 'required|unique:clientes',
            'cnpj' => 'required|unique:clientes',
            'nome' => 'required',
            'data_fundacao' => 'required|date',
        ]);

        $cliente = Cliente::create($request->all());

        return response()->json(['cliente' => $cliente], 201);
    }

    // Método para remover um cliente pelo ID
    public function destroy($id)
    {
        $cliente = Cliente::find($id);

        if (!$cliente) {
            return response()->json(['message' => 'Cliente não encontrado'], 404);
        }

        $cliente->delete();

        return response()->json(['message' => 'Cliente removido com sucesso'], 200);
    }
}