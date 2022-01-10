<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\UserController;
use App\Http\Controllers\EmpleadoController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\DocumentoController;
use App\Http\Controllers\HojaDocumentoController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\BitacoraController;
use App\Http\Controllers\ReporteController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\CitaController;
use App\Http\Controllers\PedidoController;
use App\Http\Controllers\NoticiaController;
use App\Http\Controllers\DetallePedidoController;
use App\Http\Controllers\PagoController;
use App\Http\Controllers\TipoDePagoController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('index');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Route::get('/home', 'App\Http\Controllers\HomeController@index')->name('home');

Route::group(['middleware' => 'auth'], function () {
	Route::resource('user', 'App\Http\Controllers\UserController', ['except' => ['show']]);
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'App\Http\Controllers\ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'App\Http\Controllers\ProfileController@update']);
	Route::get('upgrade', function () {return view('pages.upgrade');})->name('upgrade'); 
	 Route::get('map', function () {return view('pages.maps');})->name('map');
	 Route::get('icons', function () {return view('pages.icons');})->name('icons'); 
	 Route::get('table-list', function () {return view('pages.tables');})->name('table');
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'App\Http\Controllers\ProfileController@password']);
});

Route::resource('users',UserController::class)->names('admin.users');
Route::resource('empleados',EmpleadoController::class);
Route::patch('user-profile',[UserController::class,'changeProfile'])->name('user.change.perfil');

Route::resource('roles', RoleController::class)->names('admin.roles');

Route::resource('clientes',ClienteController::class);
Route::resource('empleados',EmpleadoController::class);
Route::resource('productos',ProductoController::class);
Route::resource('documentos',DocumentoController::class);
Route::resource('documentos-hojas',HojaDocumentoController::class);

Route::get('documentos-hojas-edit/{documento}',[HojaDocumentoController::class,'index2'])->name('documentos-hojas.index2');
Route::post('documentos-hojas-store/{documento}',[HojaDocumentoController::class,'store2'])->name('documentos-hojas.store2');

Route::get('bitacora',[BitacoraController::class,'index'])->name('bitacora.index');

Route::get('reportes-hoy',[ReporteController::class,'reporte_hoy'])->name('reporte.hoy');
Route::post('reportes-fecha',[ReporteController::class,'reporte_fecha'])->name('reporte.fecha');

Route::resource('citas',CitaController::class);

Route::resource('pedidos',PedidoController::class);
Route::get('pedido-pago/{pedido}',[PagoController::class,'create_pago'])->name('pedido.pago.create');

Route::get('detalle-pedido-create/{cliente}',[DetallePedidoController::class,'create_detalle'])->name('detalle.pedido.create');
Route::resource('detalle_pedidos',DetallePedidoController::class);

Route::resource('noticias',NoticiaController::class);

Route::resource('pagos',PagoController::class);
Route::post('pago-store/{pedido}',[PagoController::class,'store_pago'])->name('pedido.pago.store');

Route::resource('tipo_de_pagos',TipoDePagoController::class);
