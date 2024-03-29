<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FarmaciaController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('/farmacia')->group(function () use ($router){
    $router->post('/crear', [FarmaciaController::class, 'registrarFarmacia']);
    $router->post('/modificar', [FarmaciaController::class, 'modificarFarmacia']);
    $router->post('/eliminar', [FarmaciaController::class, 'eliminarFarmacia']);
});

Route::prefix('/medicamento')->group(function () use ($router){
    $router->post('/crear', [MedicamentoController::class, 'registrarMedicamento']);
    $router->post('/modificar', [MedicamentoController::class, 'modificarMedicamento']);
    $router->post('/eliminar', [MedicamentoController::class, 'eliminarMedicamento']);
});

Route::prefix('/centro')->group(function () use ($router){
    $router->post('/crear', [CentroController::class, 'registrarCentro']);
    $router->post('/modificar', [CentroController::class, 'modificarCentro']);
    $router->post('/eliminar', [CentroController::class, 'eliminarCentro']);
});