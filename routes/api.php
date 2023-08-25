<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\GrupoController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Rotas públicas para registro e login de gerentes
Route::post('/register', [RegisterController::class, 'register']);
Route::post('/login', [LoginController::class, 'login']);

// Middleware para autenticação de gerentes
Route::middleware(['auth:api'])->group(function () {
    // Rotas para clientes
    Route::get('/clientes', [ClienteController::class, 'index']);
    Route::post('/clientes', [ClienteController::class, 'store']);
    Route::delete('/clientes/{id}', [ClienteController::class, 'destroy']);

    // Rotas para grupos (apenas para gerentes de nível dois)
    Route::middleware(['check.level:2'])->group(function () {
        Route::get('/grupos', [GrupoController::class, 'index']);
        Route::post('/grupos', [GrupoController::class, 'store']);
        Route::put('/grupos/{id}', [GrupoController::class, 'update']);
        Route::delete('/grupos/{id}', [GrupoController::class, 'destroy']);
    });
});