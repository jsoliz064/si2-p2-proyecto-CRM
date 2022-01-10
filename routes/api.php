<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\EmpleadoController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\CitaController;
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

Route::post('login',[UserController::class,'login']);
route:: get('hola',[UserController::class,'hola']);


Route::get('getUsers',[UserController::class,'getUsers']);
Route::get('getEmpleados',[EmpleadoController::class,'getEmpleados']);
Route::get('getClientes',[ClienteController::class,'getClientes']);

Route::get('getCitasAll',[CitaController::class,'getCitasAll']);
Route::get('getCitas/{idUsuario}',[CitaController::class,'getCitas']);