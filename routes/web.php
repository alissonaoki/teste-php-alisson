<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


// Rotas para Clientes
Route::get('/clientes', 'ClienteController@index'); // Listar clientes
Route::post('/clientes', 'ClienteController@store'); // Adicionar cliente
Route::delete('/clientes/{cliente}', 'ClienteController@destroy'); // Remover cliente

// Rotas para Grupos
Route::get('/grupos', 'GrupoController@index'); // Visualizar grupos

// Rotas para Grupos (apenas para gerentes de nível dois)
Route::middleware('auth:api', 'can:editar-grupos')->group(function () {
    Route::post('/grupos', 'GrupoController@store'); // Criar grupo
    Route::put('/grupos/{grupo}', 'GrupoController@update'); // Editar grupo
    Route::delete('/grupos/{grupo}', 'GrupoController@destroy'); // Excluir grupo
});